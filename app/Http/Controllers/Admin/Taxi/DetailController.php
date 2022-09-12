<?php

namespace App\Http\Controllers\Admin\Taxi;

use App\Http\Controllers\Controller;
use App\Services\Admin\Taxi\DetailService;
use App\Services\Admin\Taxi\TaxiService;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * @var string
     */
    private $view = 'admin.taxi.detail.';
    private DetailService $detailService;
    private TaxiService $taxiService;

    /**
     * DetailController constructor.
     * @param DetailService $detailService
     * @param TaxiService $taxiService
     */
    public function __construct(
        DetailService $detailService,
        TaxiService $taxiService
    )
    {
        $this->detailService = $detailService;
        $this->taxiService = $taxiService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->detailService->datatable($request);
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
        $taxies = $this->taxiService->all()->pluck('name', 'id');

        return view($this->view.'create', compact('taxies'));
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
        $storeData['status'] = $request->boolean('status');
        $this->detailService->create($storeData);
        flash('Taxi Detail Added Successfully.')->success();

        return redirect()->route('admin.taxi-detail.index');
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
        $detail = $this->detailService->findOrFail($id);
        $taxies = $this->taxiService->all()->pluck('name', 'id');

        return view($this->view.'edit', compact('detail', 'taxies'));
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
        $updateData['status'] = $request->boolean('status');
        $this->detailService->update($id, $updateData);
        flash('Raxi Detail Updated Successfully.')->success();

        return redirect()->route('admin.taxi-detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->detailService->destroy($id);
        flash('Taxi Detail Deleted Successfully.')->success();

        return redirect()->back();
    }
}
