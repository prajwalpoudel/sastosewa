<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Taxi\TaxiDetail;
use App\Models\Ticket\Ticket;
use App\Models\Tour\Tour;
use App\Services\Admin\BookingService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BookingService $bookingService;

    /**
     * BookingController constructor.
     * @param BookingService $bookingService
     */
    public function __construct(
        BookingService $bookingService
    )
    {
        $this->bookingService = $bookingService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index() {
        $ticketBookings = $this->bookingService->query()->where(['user_id' => getAuthenticatedUser('front', 'id'), 'bookable_type' => Ticket::class])->with('details')->get();
        $tourBookings = $this->bookingService->query()->where(['user_id' => getAuthenticatedUser('front', 'id'), 'bookable_type' => Tour::class])->with('details')->get();;
        $taxiBookings = $this->bookingService->query()->where(['user_id' => getAuthenticatedUser('front', 'id'), 'bookable_type' => TaxiDetail::class])->with('details')->get();;
        return view('front.bookings.index', compact('ticketBookings', 'tourBookings', 'taxiBookings'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id) {
        $booking = $this->bookingService->findOrFail($id)->load(['details', 'bookable']);
        return view('front.bookings.show', compact('booking'));
    }
}
