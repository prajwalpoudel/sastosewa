<?php


namespace App\Services\Admin;


use App\Models\Labor;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class LaborService extends BaseService
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
    public function model()
    {
        return Labor::class;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable() {
        $query = $this->datatableQuery();

        return $this->dataTables->of($query)
            ->editColumn('country', function($q) {
                $otherLinks = '<a class="mr-1 pr-2" href="'. route("admin.labor.document.create", $q) .'"> <i class="la la-file la-lg"></i></a>';
                return $q->country->name . ' '. $otherLinks ;
            })
            ->editColumn('is_popular', function($q){
                $value = $q->is_popular;
                return  view('admin.datatable.checkbox', compact('value'));
            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.labor',
                    'id' => $q->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action', 'content', 'country', 'is_popular'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @return Collection|Model[]
     */
    public function datatableQuery() {
        return $this->query()->with('country')->select(['labors.*']);
    }

}