<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Admin\Taxi\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BookingService $taxiBookingService;

    /**
     * BookingController constructor.
     * @param BookingService $taxiBookingService
     */
    public function __construct(BookingService $taxiBookingService)
    {
        $this->taxiBookingService = $taxiBookingService;
    }

    public function index() {
        $ticketBookings = $this->taxiBookingService->query()->where(['user_id' => getAuthenticatedUser('front', 'id')])->with('taxiDetail.taxi')->get();
        $tourBookings = $this->taxiBookingService->query()->where(['user_id' => getAuthenticatedUser('front', 'id')])->with('taxiDetail.taxi')->get();
        $taxiBookings = $this->taxiBookingService->query()->where(['user_id' => getAuthenticatedUser('front', 'id')])->with('taxiDetail.taxi')->get();
        return view('front.bookings.index', compact('ticketBookings', 'tourBookings', 'taxiBookings'));
    }
}
