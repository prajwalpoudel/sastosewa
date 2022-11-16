<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket\Ticket;
use App\Services\Admin\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * @var string
     */
    private $view = 'admin.tickets.booking.';
    private BookingService $bookingService;

    /**
     * BookingController constructor.
     * @param BookingService $bookingService
     */
    public function __construct(
        BookingService $bookingService
    )
    {
        $this->bookingService = $bookingService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        if ($request->wantsJson()) {
            return $this->bookingService->datatable($request, Ticket::class);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = $this->bookingService->findOrFail($id)->load(['details', 'bookable']);
        return view($this->view.'show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
