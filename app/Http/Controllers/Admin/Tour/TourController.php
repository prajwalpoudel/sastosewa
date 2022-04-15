<?php

namespace App\Http\Controllers\Admin\Tour;

use App\Http\Controllers\Controller;
use App\Services\Admin\Tour\CategoryService;
use App\Services\Admin\Tour\TourService;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * @var string
     */
    private $view = 'admin.tours.tour.';
    private TourService $tourService;
    private CategoryService $categoryService;

    /**
     * TourController constructor.
     * @param TourService $tourService
     * @param CategoryService $categoryService
     */
    public function __construct(
        TourService $tourService,
        CategoryService $categoryService
    )
    {
        $this->tourService = $tourService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->tourService->datatable($request);
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
        $categories = $this->categoryService->all()->pluck('name', 'id');

        return view($this->view.'create', compact('categories'));
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
        $this->tourService->create($storeData);
        flash('Tour added successfully.')->success();

        return redirect()->route('admin.tour.index');
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
        $tour = $this->tourService->findOrFail($id);
        $categories = $this->categoryService->all()->pluck('name', 'id');

        return view($this->view.'edit', compact('tour', 'categories'));
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
        $this->tourService->update($id, $updateData);
        flash('Tour updated successfully.')->success();

        return redirect()->route('admin.tour.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tourService->destroy($id);
        flash('Tour deleted successfully.')->success();

        return redirect()->back();
    }
}
