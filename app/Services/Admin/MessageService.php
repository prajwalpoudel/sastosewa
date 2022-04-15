<?php


namespace App\Services\Admin;


use App\Models\Message;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class MessageService extends BaseService
{
    private DataTables $dataTables;

    /**
     * MessageService constructor.
     * @param DataTables $dataTables
     */
    public function __construct(
        DataTables $dataTables
    ) {
        parent::__construct();
        $this->dataTables = $dataTables;
    }

    /**
     * @return string
     */
    public function model()
    {
        return Message::class;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable() {
        $query = $this->datatableQuery();

        return $this->dataTables->of($query)
            ->addColumn('action', function ($q) {
                $params = [
                    'route' => 'admin.ticket',
                    'id' => $q->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
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
