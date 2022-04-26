<?php


namespace App\Services\Admin;


use App\Models\Testimonial;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class TestimonialService extends BaseService
{
    private DataTables $dataTables;

    /**
     * TestimonialService constructor.
     * @param DataTables $dataTables
     */
    public function __construct(DataTables $dataTables)
    {
        parent::__construct();
        $this->dataTables = $dataTables;
    }

    public function model() {
        return Testimonial::class;
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
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.testimonial',
                    'id' => $q->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['image', 'action'])
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
