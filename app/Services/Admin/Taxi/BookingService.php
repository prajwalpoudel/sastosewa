<?php


namespace App\Services\Admin\Taxi;


use App\Constants\StatusConstant;
use App\Models\Taxi\TaxiBooking;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class BookingService extends BaseService
{
    private DataTables $dataTables;

    /**
     * DetailService constructor.
     * @param DataTables $dataTables
     */
    public function __construct(DataTables $dataTables)
    {
        parent::__construct();
        $this->dataTables = $dataTables;
    }

    /**
     * @return string
     */
    public function model()
    {
        return TaxiBooking::class;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable() {
        $query = $this->datatableQuery();

        return $this->dataTables->of($query)
            ->editColumn('status', function($q) {
                return ($q->status == StatusConstant::PENDING) ? ('<span class="">Pending</span>') : ($q->status == StatusConstant::ACCEPTED ? '<span class="">Accepted</span>' : '<span class="">Rejected</span>');
            })
            ->addColumn('taxi_name', function ($query) {
                return $query->taxiDetail->taxi->name;
            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.taxi-booking',
                    'id' => $q->id,
                    'edit' => false,
                    'delete' => true,
                    'show' => true
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
        return $this->query()->with(['taxiDetail.taxi'])->select(['taxi_bookings.*']);
    }
}
