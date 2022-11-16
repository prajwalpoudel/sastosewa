<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Admin\CountryService;
use App\Services\Admin\LaborService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LaborController extends Controller
{
    private CountryService $countryService;
    private LaborService $laborService;

    /**
     * LaborController constructor.
     * @param CountryService $countryService
     * @param LaborService $laborService
     */
    public function __construct(
        CountryService $countryService,
        LaborService $laborService
    ) {

        $this->countryService = $countryService;
        $this->laborService = $laborService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request) {
        if($id = $request->input('country_id')) {
            return redirect()->route('front.labor.show', $id);
        }
        $countries = $this->countryService->query()->with('labor')->whereHas('labor')->get()->pluck('name', 'labor.id');
        $popularLabor = $this->laborService->query()->where(['is_popular' => true])->with('country')->limit(6)->get();

        return view('front.labor.index', compact('countries', 'popularLabor'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id) {
        $labor = $this->laborService->findOrFail($id)->load(['country', 'documents.medias']);

        return view('front.labor.detail', compact('labor'));
    }
}
