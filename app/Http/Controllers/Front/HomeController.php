<?php

namespace App\Http\Controllers\Front;

use App\Constants\PageConstant;
use App\Http\Controllers\Controller;
use App\Services\Admin\Cms\SectionService;
use App\Services\Admin\Tour\TourService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private SectionService $sectionService;
    private TourService $tourService;

    /**
     * HomeController constructor.
     * @param SectionService $sectionService
     * @param TourService $tourService
     */
    public function __construct(
        SectionService $sectionService,
        TourService $tourService
    )
    {
        $this->sectionService = $sectionService;
        $this->tourService = $tourService;
    }

    private $view = 'front.home.';

    /**
     * @return Application|Factory|View
     */
    public function index() {
        $sections = $this->sectionService->query()->whereHas('page', function($query) {
            $query->where('title', PageConstant::HOME);
        })->with(['medias'])->get()->keyBy('slug')->toArray();
        $tours = $this->tourService->query()->limit(6)->get();

        return view($this->view.'index', compact('sections', 'tours'));
    }
}
