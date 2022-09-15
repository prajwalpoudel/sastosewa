<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\CountryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    /**
     * @var string
     */
    private $view = 'admin.country.';
    private CountryService $countryService;

    /**
     * CountryController constructor.
     * @param CountryService $countryService
     */
    public function __construct(
        CountryService $countryService
    )
    {
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
            return $this->countryService->datatable($request);
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
        try {
            $storeData = $request->all();
            if($image = $request->file('image')) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $storeData['image'] = Storage::putFileAs('medias', $image, $imageName);
            }
            $this->countryService->create($storeData);
        }
        catch (\Exception $e) {
            throw($e);
        }


        return redirect()->route('admin.country.index');
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
        $country = $this->countryService->findOrFail($id);

        return view($this->view.'edit', compact('country'));
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
        try {
            $updateData = $request->all();
            if($image = $request->file('image')) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $updateData['image'] = Storage::putFileAs('medias', $image, $imageName);
            }
            $this->countryService->update($id, $updateData);
        }
        catch (\Exception $e) {
            throw($e);
        }

        return redirect()->route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = $this->countryService->findOrFail($id);
        if(Storage::exists($country->image)) {
            Storage::delete($country->image);
        }
        $this->countryService->destroy($id);

        return redirect()->back();
    }
}
