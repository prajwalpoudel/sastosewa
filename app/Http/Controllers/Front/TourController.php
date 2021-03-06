<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Tour\Tour;
use App\Services\Admin\Tour\TourService;
use Illuminate\Http\Request;

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
        $this->tourService = $tourService;
    }

    public function index() {
        $tours = $this->tourService->all();

        return view($this->view.'index', compact('tours'));
    }

    public function show(Tour $tour) {
        $similarTours = $this->tourService->where([
            ['category_id', '=', $tour->category_id],
            ['status', '=', true],
            ['id', '!=', $tour->id]
            ])->limit(4)->get();
        return view($this->view.'show', compact('tour', 'similarTours'));
    }
}
