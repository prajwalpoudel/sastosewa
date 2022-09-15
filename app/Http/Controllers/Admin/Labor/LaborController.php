<?php

namespace App\Http\Controllers\Admin\Labor;

use App\Http\Controllers\Controller;
use App\Services\Admin\CountryService;
use App\Services\Admin\LaborService;
use Illuminate\Http\Request;

class LaborController extends Controller
{
    private $view = 'admin.labor.';
    private LaborService $laborService;
    private CountryService $countryService;

    /**
     * LaborController constructor.
     * @param LaborService $laborService
     * @param CountryService $countryService
     */
    public function __construct(
        LaborService $laborService,
        CountryService $countryService
    )
    {
        $this->laborService = $laborService;
        $this->countryService = $countryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->wantsJson()) {
            return $this->laborService->datatable($request);
        }

        return view($this->view.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $this->countryService->all()->pluck('name', 'id');

        return view($this->view.'create', compact('countries'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->all();
        $storeData['is_popular'] = $request->boolean('is_popular');

        $this->laborService->create($storeData);

        return redirect()->route('admin.labor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $labor = $this->laborService->findOrFail($id);
        $countries = $this->countryService->all()->pluck('name', 'id');

        return view($this->view.'edit', compact('labor', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->all();
        $updateData['is_popular'] = $request->boolean('is_popular');

        $this->laborService->update($id, $updateData);

        return redirect()->route('admin.labor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->laborService->destroy($id);

        return redirect()->back();
    }
}
