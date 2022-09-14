<?php

namespace App\Http\Controllers\Front;

use App\Constants\PageConstant;
use App\Http\Controllers\Controller;
use App\Services\Admin\BookingService;
use App\Services\Admin\Cms\SectionService;
use App\Services\Admin\Taxi\DetailService;
use App\Services\Admin\Taxi\TaxiService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxiController extends Controller
{
    private $view = 'front.taxi.';
    private TaxiService $taxiService;
    private DetailService $detailService;
    private SectionService $sectionService;
    private BookingService $bookingService;

    /**
     * TaxiController constructor.
     * @param TaxiService $taxiService
     * @param DetailService $detailService
     * @param SectionService $sectionService
     * @param BookingService $bookingService
     */
    public function __construct(
        TaxiService $taxiService,
        DetailService $detailService,
        SectionService $sectionService,
        BookingService $bookingService
    ) {
        $this->middleware(['web', 'auth:front'])->except('index');
        $this->taxiService = $taxiService;
        $this->detailService = $detailService;
        $this->sectionService = $sectionService;
        $this->bookingService = $bookingService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index() {
        $sections = $this->sectionService->query()->whereHas('page', function($query) {
            $query->where('title', PageConstant::TAXI);
        })->with(['medias'])->get()->keyBy('slug')->toArray();
        $taxies = $this->detailService->query()->with(['taxi'])->get();

        return view($this->view.'index', compact('taxies', 'sections'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return Application|Factory|View
     */
    public function book($id, Request $request) {
        $taxi = $this->detailService->findOrFail($id);

        return view($this->view.'book', compact('taxi'));
    }

    /**
     * @param Request $request
     */
    public function bookTaxi(Request $request) {
        DB::beginTransaction();
        $taxi = $this->detailService->findOrFail($request->input('taxi_id'));
        $booking = $taxi->bookings()->create([
            'user_id' => $request->input('user_id'),
            'booking_price' => $request->input('booking_price')
        ]);
        $booking->details()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'price' => $request->input('price'),
            'bookable_name' => $request->input('bookable_name'),
            'from' => $request->input('from'),
            'to' => $request->input('to')
        ]);
        DB::commit();
        return redirect()->route('front.bookings.index');
    }
}
