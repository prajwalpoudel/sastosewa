<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Services\Admin\Ticket\CategoryService;
use App\Services\Admin\Ticket\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * @var string
     */
    private $view = 'admin.tickets.ticket.';

    /**
     * @var TicketService
     */
    private TicketService $ticketService;
    private CategoryService $categoryService;

    /**
     * TicketController constructor.
     * @param TicketService $ticketService
     * @param CategoryService $categoryService
     */
    public function __construct(
        TicketService $ticketService,
        CategoryService $categoryService
    )
    {
        $this->ticketService = $ticketService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->ticketService->datatable($request);
        }

        return view($this->view.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->all()->pluck('name', 'id');

        return view($this->view.'create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->all();
        $storeData['status'] = $request->boolean('status');
        $this->ticketService->create($storeData);
        flash('Ticket added successfully.')->success();

        return redirect()->route('admin.ticket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = $this->ticketService->findOrFail($id);
        $categories = $this->categoryService->all()->pluck('name', 'id');

        return view($this->view.'edit', compact('ticket', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->all();
        $updateData['status'] = $request->boolean('status');
        $this->ticketService->update($id, $updateData);
        flash('Ticket updated successfully.')->success();

        return redirect()->route('admin.ticket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ticketService->destroy($id);
        flash('Ticket deleted successfully.')->success();

        return redirect()->back();
    }
}
