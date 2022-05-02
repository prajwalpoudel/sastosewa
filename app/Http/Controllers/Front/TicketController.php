<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Admin\Ticket\TicketService;
use Illuminate\Http\Request;

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
        $this->ticketService = $ticketService;
    }

    public function index() {
        $tickets = $this->ticketService->upcomingTickets();
        return view($this->view.'index', compact('tickets'));
    }

    public function search(Request $request) {
        $tickets = $this->ticketService->query()->where('from', $request->input('origin'))
                        ->orWhere('to', $request->input('destination'))
                        ->orWhere('date', $request->input('departure_date'))->get();

        return view($this->view.'index', compact('tickets'));
    }

    public function book($id, Request $request) {
        $ticket = $this->ticketService->findOrFail($id);

        return view($this->view.'book', compact('ticket'));
    }
}
