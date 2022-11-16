<?php

namespace App\Http\Controllers\Admin\Labor;

use App\Http\Controllers\Controller;
use App\Services\Admin\LaborDocumentService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    private $view = 'admin.labor.document.';
    private LaborDocumentService $laborDocumentService;

    /**
     * DocumentController constructor.
     * @param LaborDocumentService $laborDocumentService
     */
    public function __construct(LaborDocumentService $laborDocumentService)
    {
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
            return $this->laborDocumentService->datatable($request);
        }

        return view($this->view.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($laborId)
    {
        return view($this->view.'create', compact('laborId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->only(['title', 'labor_id']);
        $this->laborDocumentService->create($storeData);

        return redirect()->route('admin.labor.document.create', $request->input('labor_id'));
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
        $document = $this->laborDocumentService->findOrFail($id);
        $laborId = $document->labor_id;

        return view($this->view.'edit', compact('document', 'laborId'));
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
        $this->laborDocumentService->update($id, $updateData);

        return redirect()->route('admin.labor.document.create', $request->input('labor_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->laborDocumentService->destroy($id);

        return redirect()->back();
    }
}
