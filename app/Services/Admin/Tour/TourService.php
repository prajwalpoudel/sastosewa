<?php


namespace App\Services\Admin\Tour;


use App\Models\Tour\Tour;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class TourService extends BaseService
{
    private DataTables $dataTables;

    /**
     * CategoryService constructor.
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
    public function model()
    {
        return Tour::class;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable()
    {
        $query = $this->datatableQuery();

        return $this->dataTables->of($query)
            ->editColumn('status', function($q) {
                return $q->status ? '<span class="">Active</span>' : '<span class="">InActive</span>';
            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.tour',
                    'id' => $q->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['status', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @return Collection|Model[]
     */
    public function datatableQuery() {
        return $this->query()->with('category');
    }
}
