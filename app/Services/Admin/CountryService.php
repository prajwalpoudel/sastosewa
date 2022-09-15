<?php


namespace App\Services\Admin;


use App\Models\Country;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CountryService extends BaseService
{
    private DataTables $dataTables;

    /**
     * CountryService constructor.
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
        return Country::class;
    }
    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable() {
        $query = $this->datatableQuery();

        return $this->dataTables->of($query)
            ->editColumn('image', function($query) {
                return '<img src="'. Storage::url($query->image) .'" height="48px" width="60px"/>';
            })
            ->editColumn('description', function($q){
                return Str::limit($q->description, 100, '...');
            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.country',
                    'id' => $q->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action', 'image', 'description'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @return Collection|Model[]
     */
    public function datatableQuery() {
        return $this->query();
    }
}
