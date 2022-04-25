<?php


namespace App\Services\Admin\Cms;


use App\Models\Cms\Media;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class MediaService extends BaseService
{
    private DataTables $dataTables;

    /**
     * MediaService constructor.
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
        return Media::class;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable()
    {
        $query = $this->datatableQuery();

        return $this->dataTables->of($query)
            ->editColumn('media', function($query) {
                return '<img src="'. Storage::url($query->media) .'" height="48px" width="60px"/>';
            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.page.media',
                    'id' => $q->id,
                    'edit' => false,
                    'delete' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['media', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @return Collection|Model[]
     */
    public function datatableQuery() {
        $query = $this->query();
        if($sectionId = request()->input('sectionId')) {
            $query = $query->where('section_id', $sectionId);
        }
        return $query;
    }
}
