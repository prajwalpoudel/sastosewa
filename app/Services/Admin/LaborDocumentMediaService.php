<?php


namespace App\Services\Admin;


use App\Models\LaborDocumentMedia;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class LaborDocumentMediaService extends BaseService
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
        return LaborDocumentMedia::class;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable() {
        $query = $this->datatableQuery();

        return $this->dataTables->of($query)
            ->editColumn('media', function($q) {
                return '<img src="'. Storage::url($q->media) .'" height="48px" width="60px"/>';

            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.labor.document.media',
                    'id' => $q->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action', 'media'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @return Collection|Model[]
     */
    public function datatableQuery() {
        $query = $this->query();
        if($laborDocumentId = request()->input('laborDocumentId')) {
            $query = $query->where('labor_document_id', $laborDocumentId);
        }
        return $query->select(['labor_document_media.*']);
    }
}
