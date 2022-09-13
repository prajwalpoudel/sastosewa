<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\TourBookingRequest;
use App\Models\Tour\Tour;
use App\Services\Admin\Tour\TourService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    private $view = 'front.tour.';
    private TourService $tourService;

    /**
     * TourController constructor.
     * @param TourService $tourService
     */
    public function __construct(TourService $tourService)
    {
        $this->middleware(['web', 'auth:front'])->except(['index', 'show']);
        $this->tourService = $tourService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index() {
        $tours = $this->tourService->all();

        return view($this->view.'index', compact('tours'));
    }

    /**
     * @param Tour $tour
     * @return Application|Factory|View
     */
    public function show(Tour $tour) {
        $similarTours = $this->tourService->where([
            ['category_id', '=', $tour->category_id],
            ['status', '=', true],
            ['id', '!=', $tour->id]
            ])->limit(4)->get();
        return view($this->view.'show', compact('tour', 'similarTours'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return Application|Factory|View
     */
    public function book($id, Request $request) {
        $tour = $this->tourService->findOrFail(decrypt($id));

        return view($this->view.'book', compact('tour'));
    }

    /**
     * @param TourBookingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bookTour(TourBookingRequest $request) {
        DB::beginTransaction();
        $tour = $this->tourService->findOrFail($request->input('tour_id'));
        $booking = $tour->bookings()->create([
            'user_id' => $request->input('user_id'),
            'booking_price' => $request->input('booking_price')
        ]);
        foreach($request->input('user') as $user) {
            $booking->details()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'address' => $user['address'],
                'phone' => $user['phone'],
                'price' => $request->price,
                'bookable_name' => $request->bookable_name,
                'category_name' => $request->category_name,
                'code' => $request->code,
                'grade' => $request->grade,
                'seasons' => $request->seasons,
                'route' => $request->route,
                'departure_date' => $request->departure_date,
                'arrival_date' => $request->arrival_date,
            ]);
        }
        DB::commit();

        return redirect()->route('front.bookings.index');

    }
}
