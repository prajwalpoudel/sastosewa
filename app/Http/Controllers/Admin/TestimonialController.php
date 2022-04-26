<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\TestimonialService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * @var string
     */
    private $view = 'admin.testimonials.';
    private TestimonialService $testimonialService;

    /**
     * TestimonialController constructor.
     * @param TestimonialService $testimonialService
     */
    public function __construct(TestimonialService $testimonialService)
    {
        $this->testimonialService = $testimonialService;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|mixed
     * @throws \Exception
     */
    public function index(Request $request) {
        if ($request->wantsJson()) {
            return $this->testimonialService->datatable($request);
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
        if($image = $request->file('image')) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $storeData['image'] = Storage::putFileAs('testimonials', $image, $imageName);
        }
        $this->testimonialService->create($storeData);
        flash('Testimonials added successfully.')->success();

        return redirect()->route('admin.testimonial.index');
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
        $testimonial = $this->testimonialService->findOrFail($id);

        return view($this->view.'edit', compact('testimonial'));
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
        $testimonial = $this->testimonialService->findOrFail($id);
        $updateData = $request->all();

        if($image = $request->file('image')) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $updateData['image'] = Storage::putFileAs('testimonials', $image, $imageName);
            if(Storage::exists($testimonial->image)) {
                Storage::delete($testimonial->image);
            }
        }
        $testimonial->update($updateData);
        flash('Testimonial updated successfully.')->success();

        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = $this->testimonialService->findOrFail($id);
        if(Storage::exists($testimonial->image)) {
            Storage::delete($testimonial->image);
        }
        $testimonial->delete();
        flash('Testimonial deleted successfully.')->success();

        return redirect()->back();
    }
}
