<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ticket\Ticket;
use App\Models\Tour\Tour;
use App\Services\Admin\BookingService;
use App\Services\Admin\Taxi\BookingService as TaxiBookingService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private TaxiBookingService $taxiBookingService;
    private BookingService $bookingService;

    /**
     * BookingController constructor.
     * @param TaxiBookingService $taxiBookingService
     * @param BookingService $bookingService
     */
    public function __construct(
        TaxiBookingService $taxiBookingService,
        BookingService $bookingService
    )
    {
        $this->taxiBookingService = $taxiBookingService;
        $this->bookingService = $bookingService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index() {
        $ticketBookings = $this->bookingService->query()->where(['user_id' => getAuthenticatedUser('front', 'id'), 'bookable_type' => Ticket::class])->with('details')->get();
        $tourBookings = $this->bookingService->query()->where(['user_id' => getAuthenticatedUser('front', 'id'), 'bookable_type' => Tour::class])->with('details')->get();;
        $taxiBookings = $this->taxiBookingService->query()->where(['user_id' => getAuthenticatedUser('front', 'id')])->with('taxiDetail.taxi')->get();
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
