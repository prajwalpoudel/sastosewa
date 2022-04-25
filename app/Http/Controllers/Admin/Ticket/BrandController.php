<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Services\Admin\Ticket\BrandService;
use App\Services\Admin\Ticket\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    private $view = 'admin.tickets.brand.';

    private BrandService $brandService;
    private CategoryService $categoryService;

    /**
     * BrandController constructor.
     * @param BrandService $brandService
     * @param CategoryService $categoryService
     */
    public function __construct(
        BrandService $brandService,
        CategoryService $categoryService
    )
    {
        $this->brandService = $brandService;
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
            return $this->brandService->datatable($request);
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
        if($logo = $request->file('logo')) {
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $storeData['logo'] = Storage::putFileAs('logo', $logo, $logoName);
        }
        $brand = $this->brandService->create($storeData);
        flash('Ticket brand added successfully.')->success();

        return redirect()->route('admin.ticket.brand.index');
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
        $categories = $this->categoryService->all()->pluck('name', 'id');
        $brand = $this->brandService->findOrFail($id);

        return view($this->view.'edit', compact('categories', 'brand'));
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
        DB::beginTransaction();
        $brand = $this->brandService->findOrFail($id);
        $updateData = $request->all();
        if($logo = $request->file('logo')) {
            if(Storage::exists($brand->logo)) {
                Storage::delete($brand->logo);
            }

            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $updateData['logo'] = Storage::putFileAs('logo', $logo, $logoName);
        }
        $brand->update($updateData);
        DB::commit();
        flash('Ticket brand updated successfully.')->success();

        return redirect()->route('admin.ticket.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = $this->brandService->findOrFail($id);
        if(Storage::exists($brand->logo)) {
            Storage::delete($brand->logo);
        }
        $this->brandService->destroy($id);
        flash('Ticket brand deleted successfully.')->success();

        return redirect()->back();
    }
}
