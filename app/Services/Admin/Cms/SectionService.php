<?php


namespace App\Services\Admin\Cms;


use App\Models\Cms\Section;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class SectionService extends BaseService
{
    private DataTables $dataTables;

    /**
     * SectionService constructor.
     * @param DataTables $dataTables
     */
    public function __construct(
        DataTables $dataTables
    )
    {
        parent::__construct();
        $this->dataTables = $dataTables;
    }

    public function model()
    {
        return Section::class;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable()
    {
        $query = $this->datatableQuery();

        return $this->dataTables->of($query)
            ->editColumn('page_title', function($q) {
                $otherLinks = '<a class="mr-1 pr-2" href="'. route("admin.page.media.create", $q) .'"> <i class="la la-camera la-lg"></i></a>';
                return $q->page_title . ' '. $otherLinks ;
            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.page.section',
                    'id' => $q->id,
                    'edit' => true,
                    'delete' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['page_title', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @return Collection|Model[]
     */
    public function datatableQuery() {
        return $this->query()->with('page')->select('sections.*');
    }
}
