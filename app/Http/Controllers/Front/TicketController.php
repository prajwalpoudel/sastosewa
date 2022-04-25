<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Admin\Ticket\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    private $view = 'front.ticket.';
    private TicketService $ticketService;

    /**
     * TicketController constructor.
     * @param TicketService $ticketService
     */
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index() {
        $tickets = collect([]);
        return view($this->view.'index', compact('tickets'));
    }
}
