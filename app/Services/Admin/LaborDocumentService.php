<?php


namespace App\Services\Admin;


use App\Models\LaborDocument;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class LaborDocumentService extends BaseService
{
    private DataTables $dataTables;

    /**
     * LaborService constructor.
     * @param DataTables $dataTables
     */
    public function __construct(
        DataTables $dataTables
    )
    {
        parent::__construct();
        $this->dataTables = $dataTables;
    }

    /**
     * @return string
     */
    public function model() {
        return LaborDocument::class;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable() {
        $query = $this->datatableQuery();

        return $this->dataTables->of($query)
            ->editColumn('title', function($q) {
                $otherLinks = '<a class="mr-1 pr-2" href="'. route("admin.labor.document.media.create", $q) .'"> <i class="la la-camera la-lg"></i></a>';
                return $q->title . ' '. $otherLinks ;
            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.labor.document',
                    'id' => $q->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action', 'title'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @return Collection|Model[]
     */
    public function datatableQuery() {
        $query = $this->query();
        if($laborId = request()->input('laborId')) {
            $query = $query->where('labor_id', $laborId);
        }
        return $query->select(['labor_documents.*']);
    }
}
