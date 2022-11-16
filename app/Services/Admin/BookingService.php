<?php


namespace App\Services\Admin;


use App\Constants\StatusConstant;
use App\Models\Booking;
use App\Models\Taxi\TaxiDetail;
use App\Models\Ticket\Ticket;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class BookingService extends BaseService
{
    private DataTables $dataTables;

    /**
     * BookingService constructor.
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
        return Booking::class;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable($request, $model) {
        $query = $this->datatableQuery($model);

        if($model == TaxiDetail::class) {
            return $this->taxiBookings($query);
        }
        elseif($model == Ticket::class) {
            return $this->ticketBookings($query);
        }
        else {
            return $this->tourBookings($query);
        }
    }

    /**
     * @return Collection|Model[]
     */
    public function datatableQuery($model) {
        return $this->query()->where(['bookable_type' => $model])->with(['details', 'bookable', 'user']);
    }

    public function taxiBookings($query) {
        return $this->dataTables->of($query)
            ->editColumn('status', function($q) {
                return ($q->status == StatusConstant::PENDING) ? ('<span class="">Pending</span>') : ($q->status == StatusConstant::ACCEPTED ? '<span class="">Accepted</span>' : '<span class="">Rejected</span>');
            })
            ->editColumn('payment_status', function($q) {
                return ($q->payment_status ) ? ('<span class="">Paid</span>') : ('<span class="">Unpaid</span>');
            })
            ->addColumn('bookable_name', function ($query) {
                return $query->details[0]->bookable_name;
            })
            ->addColumn('name', function ($query) {
                return $query->details[0]->email;
            })
            ->addColumn('email', function ($query) {
                return $query->details[0]->name;
            })
            ->addColumn('address', function ($query) {
                return $query->details[0]->address;
            })
            ->addColumn('phone', function ($query) {
                return $query->details[0]->phone;
            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.taxi-booking',
                    'id' => $q->id,
                    'edit' => false,
                    'delete' => false,
                    'show' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['status', 'payment_status', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function ticketBookings($query) {
        return $this->dataTables->of($query)
            ->editColumn('status', function($q) {
                return ($q->status == StatusConstant::PENDING) ? ('<span class="">Pending</span>') : ($q->status == StatusConstant::ACCEPTED ? '<span class="">Accepted</span>' : '<span class="">Rejected</span>');
            })
            ->editColumn('payment_status', function($q) {
                return ($q->payment_status ) ? ('<span class="">Paid</span>') : ('<span class="">Unpaid</span>');
            })
            ->addColumn('bookable_name', function ($query) {
                return "<img src=".getImageUrl($query->bookable->brand->logo)." height='40px;'>&nbsp;". $query->bookable->brand->name ?? null;
            })
            ->addColumn('name', function ($query) {
                return $query->user->name;
            })
            ->addColumn('email', function ($query) {
                return $query->user->email;
            })
            ->addColumn('phone', function ($query) {
                return $query->user->phone;
            })
            ->addColumn('from', function ($query) {
                return $query->details[0]->from;
            })
            ->addColumn('to', function ($query) {
                return $query->details[0]->to;
            })

            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.ticket.booking',
                    'id' => $q->id,
                    'edit' => false,
                    'delete' => false,
                    'show' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['status', 'payment_status', 'action', 'bookable_name'])
            ->addIndexColumn()
            ->make(true);
    }

    public function tourBookings($query) {
        return $this->dataTables->of($query)
            ->editColumn('status', function($q) {
                return ($q->status == StatusConstant::PENDING) ? ('<span class="">Pending</span>') : ($q->status == StatusConstant::ACCEPTED ? '<span class="">Accepted</span>' : '<span class="">Rejected</span>');
            })
            ->editColumn('payment_status', function($q) {
                return ($q->payment_status ) ? ('<span class="">Paid</span>') : ('<span class="">Unpaid</span>');
            })
            ->addColumn('bookable_name', function ($query) {
                return $query->details[0]->bookable_name;
            })
            ->addColumn('name', function ($query) {
                return $query->user->name;
            })
            ->addColumn('email', function ($query) {
                return $query->user->email;
            })
            ->addColumn('phone', function ($query) {
                return $query->user->phone ?? $query->details[0]->phone ;
            })
            ->addColumn('grade', function ($query) {
                return $query->details[0]->grade ?? '' ;
            })
            ->addColumn('category', function ($query) {
                return $query->bookable->category->name ?? '' ;
            })
            ->addColumn('route', function ($query) {
                return $query->details[0]->route ?? '' ;
            })
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.tour.booking',
                    'id' => $q->id,
                    'edit' => false,
                    'delete' => false,
                    'show' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['status', 'payment_status', 'action'])
            ->addIndexColumn()
            ->make(true);
    }


}
