<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * @var string
     */
    private $view = 'admin.messages.';

    private MessageService $messageService;

    /**
     * MessageController constructor.
     * @param MessageService $messageService
     */
    public function __construct(
        MessageService $messageService
    )
    {
        $this->messageService = $messageService;
    }

    public function index(Request $request) {
        if ($request->wantsJson()) {
            return $this->messageService->datatable($request);
        }

        return view($this->view.'index');
    }
}
