<?php

namespace App\Http\Controllers\Admin\Labor;

use App\Http\Controllers\Controller;
use App\Services\Admin\LaborDocumentMediaService;
use App\Services\Admin\LaborDocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentMediaController extends Controller
{
    private $view = 'admin.labor.document.media.';
    private LaborDocumentMediaService $laborDocumentMediaService;
    private LaborDocumentService $laborDocumentService;

    /**
     * DocumentMediaController constructor.
     * @param LaborDocumentMediaService $laborDocumentMediaService
     * @param LaborDocumentService $laborDocumentService
     */
    public function __construct(
        LaborDocumentMediaService $laborDocumentMediaService,
        LaborDocumentService $laborDocumentService
    )
    {
        $this->laborDocumentMediaService = $laborDocumentMediaService;
        $this->laborDocumentService = $laborDocumentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->laborDocumentMediaService->datatable($request);
        }

        return view($this->view . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($laborDocumentId)
    {
        $document = $this->laborDocumentService->findOrFail($laborDocumentId);
        $laborId = $document->labor_id;
        return view($this->view . 'create', compact('laborDocumentId', 'laborId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->all();
        if ($media = $request->file('media')) {
            $mediaName = time() . '.' . $media->getClientOriginalExtension();
            $storeData['media'] = Storage::putFileAs('medias', $media, $mediaName);
        }
        $this->laborDocumentMediaService->create($storeData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = $this->laborDocumentMediaService->findOrFail($id);
        $laborDocumentId = $media->labor_document_id;

        return view($this->view . 'edit', compact('media', 'laborDocumentId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $media = $this->laborDocumentMediaService->findOrFail($id);
        if ($updateMedia = $request->file('media')) {
            $updateData = $request->all();
            if(Storage::exists($media->media)) {
                Storage::delete($media->media);
            }
            $mediaName = time() . '.' . $updateMedia->getClientOriginalExtension();
            $updateData['media'] = Storage::putFileAs('medias', $updateMedia, $mediaName);
            $media->update($updateData);
        }

        return redirect()->route('admin.labor.document.media.create', $media->labor_document_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = $this->laborDocumentMediaService->findOrFail($id);
        if(Storage::exists($media->media)) {
            Storage::delete($media->media);
        }
        $this->laborDocumentMediaService->destroy($id);

        return redirect()->back();
    }
}
