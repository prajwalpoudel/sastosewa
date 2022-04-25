<?php


namespace App\Services\Admin\Ticket;


use App\Models\Ticket\Brand;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BrandService extends BaseService
{
    private DataTables $dataTables;

    /**
     * BrandService constructor.
     * @param BrandService $brandService
     */
    public function __construct(DataTables $dataTables)
    {
        parent::__construct();
        $this->dataTables = $dataTables;
    }

    public function model()
    {
        return Brand::class;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable() {
        $query = $this->datatableQuery();

        return $this->dataTables->of($query)
            ->editColumn('logo', function ($q) {
                return '<img src='.Storage::url($q->logo). ' height="60px;" width="100px;">';

            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.ticket.brand',
                    'id' => $q->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['logo', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @return Collection|Model[]
     */
    public function datatableQuery() {
        return $this->query()->with('category')->select('ticket_brands.*');
    }
}
