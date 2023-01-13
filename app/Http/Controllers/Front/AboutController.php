<?php

namespace App\Http\Controllers\Front;

use App\Constants\PageConstant;
use App\Http\Controllers\Controller;
use App\Services\Admin\Cms\SectionService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $view = 'front.about.';
    private SectionService $sectionService;

    /**
     * AboutController constructor.
     * @param SectionService $sectionService
     */
    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index() {
        $sections = $this->sectionService->query()->whereHas('page', function($query) {
            $query->where('title', PageConstant::ABOUT);
        })->with(['medias'])->get()->keyBy('slug')->toArray();

        return view($this->view.'index', compact('sections'));
    }
}
