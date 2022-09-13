<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\TicketBookingRequest;
use App\Services\Admin\Ticket\TicketService;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    private $view = 'front.ticket.';
    private TicketService $ticketService;

    /**
     * TicketController constructor.
     * @param TicketService $ticketService
     */
    public function __construct(TicketService $ticketService)
    {
        $this->middleware(['web', 'auth:front'])->except(['index', 'search']);
        $this->ticketService = $ticketService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index() {
        $tickets = $this->ticketService->upcomingTickets();
        return view($this->view.'index', compact('tickets'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function search(Request $request) {
        $departureDate = Carbon::parse($request->input('date'));
        $now = Carbon::now();
        $tickets = $this->ticketService->query()
            ->where('from', $request->input('origin'))
            ->where('to', $request->input('destination'))
            ->whereDate('date', '>=', $departureDate->format('Y-m-d'))
            ->whereDate('date', '>=', $now->format('Y-m-d'))
            ->whereDate('date', '<', $departureDate->addDay()->format('Y-m-d'))
//            ->whereTime('departure_time', '>=', $now->addHour()->format('H:i:s'))
            ->where('status', true)
            ->where('no_of_tickets','>', 0)
            ->get();

        return view($this->view.'index', compact('tickets'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return Application|Factory|View
     */
    public function book($id, Request $request) {
        $ticket = $this->ticketService->findOrFail($id)->load(['category', 'brand']);

        return view($this->view.'book', compact('ticket'));
    }

    /**
     * @param TicketBookingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bookTicket(TicketBookingRequest $request) {
        $count = 0;
        DB::beginTransaction();
        $ticket = $this->ticketService->findOrFail($request->ticket_id);
        $booking = $ticket->bookings()->create([
            'user_id' => $request->user_id,
            'booking_price' => $request->booking_price
        ]);
        foreach($request->input('user') as $user) {
            $count++;
            $booking->details()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'address' => $user['address'],
                'phone' => $user['phone'],
                'price' => $request->price,
                'from' => $request->from,
                'to' => $request->to,
                'departure_address' => $request->departure_address,
                'arrival_address' => $request->arrival_address,
                'departure_date' => $request->departure_date,
                'departure_time' => $request->departure_time,
                'arrival_date' => $request->arrival_date,
                'arrival_time' => $request->arrival_time,

            ]);
        }
        $ticket->no_of_tickets-=$count;
        $ticket->save();
        DB::commit();

        return redirect()->route('front.bookings.index');

    }
}
