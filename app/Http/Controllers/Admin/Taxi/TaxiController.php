<?php

namespace App\Http\Controllers\Admin\Taxi;

use App\Http\Controllers\Controller;
use App\Services\Admin\Taxi\TaxiService;
use Illuminate\Http\Request;

class TaxiController extends Controller
{
    /**
     * @var string
     */
    private $view = 'admin.taxi.taxi.';
    private TaxiService $taxiService;

    /**
     * TaxiController constructor.
     * @param TaxiService $taxiService
     */
    public function __construct(TaxiService $taxiService)
    {
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
            return $this->taxiService->datatable($request);
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
        return view($this->view.'create');
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
        $this->taxiService->create($storeData);
        flash('Taxi added successfully.')->success();

        return redirect()->route('admin.taxi.index');
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
        $taxi = $this->taxiService->findOrFail($id);

        return view($this->view.'edit', compact('taxi'));
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
        $this->taxiService->update($id, $updateData);
        flash('Taxi updated successfully.')->success();

        return redirect()->route('admin.taxi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->taxiService->destroy($id);
        flash('Taxi deleted successfully.')->success();

        return redirect()->back();
    }
}
