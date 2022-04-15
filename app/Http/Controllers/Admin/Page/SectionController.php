<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Services\Admin\Cms\PageService;
use App\Services\Admin\Cms\SectionService;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * @var string
     */
    private $view = 'admin.pages.sections.';
    private SectionService $sectionService;
    private PageService $pageService;

    /**
     * SectionController constructor.
     * @param SectionService $sectionService
     * @param PageService $pageService
     */
    public function __construct(
        SectionService $sectionService,
        PageService $pageService
    )
    {
        $this->sectionService = $sectionService;
        $this->pageService = $pageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->sectionService->datatable($request);
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
        $pages = $this->pageService->all()->pluck('title', 'id');

        return view($this->view.'create', compact('pages'));
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
        $this->sectionService->create($storeData);

        return redirect()->route('admin.page.section.index');
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
        $section = $this->sectionService->findOrFail($id);
        $pages = $this->pageService->all()->pluck('title', 'id');

        return view($this->view.'edit', compact('section', 'pages'));
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
        $this->sectionService->update($id, $updateData);

        return redirect()->route('admin.page.section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
