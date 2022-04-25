<?php

namespace App\Http\Controllers\Admin\Page;

use App\Constants\General;
use App\Http\Controllers\Controller;
use App\Services\Admin\Cms\MediaService;
use App\Services\Admin\Cms\SectionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * @var string
     */
    private $view = 'admin.pages.media.';
    private MediaService $mediaService;
    private SectionService $sectionService;

    /**
     * MediaController constructor.
     * @param MediaService $mediaService
     * @param SectionService $sectionService
     */
    public function __construct(
        MediaService $mediaService,
        SectionService $sectionService
    )
    {

        $this->mediaService = $mediaService;
        $this->sectionService = $sectionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->mediaService->datatable($request);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sectionId)
    {
        $section = $this->sectionService->findOrFail($sectionId)->load('page');
        $types = getNullSelectOption(
            collect(getMediaTypes()),
            'Please Select Type'
        );

        return view($this->view.'create', compact('types', 'section'));
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
            if($media = $request->file('media')) {
                $mediaName = time() . '.' . $media->getClientOriginalExtension();
                $storeData['media'] = Storage::putFileAs('medias', $media, $mediaName);
            }
            $this->mediaService->create($storeData);
        }
        catch (\Exception $e) {
            dd($e);
        }


        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = $this->mediaService->findOrFail($id);
        if(Storage::exists($media->media)) {
            Storage::delete($media->media);
        }
        $this->mediaService->destroy($id);

        return redirect()->back();
    }
}
