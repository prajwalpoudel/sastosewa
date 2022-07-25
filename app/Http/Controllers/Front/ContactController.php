<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Services\Front\ContactService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $view = 'front.contact.';
    private ContactService $contactService;

    /**
     * ContactController constructor.
     * @param ContactService $contactService
     */
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index() {
        return view($this->view.'index');
    }

    /**
     * @param Request $request
     */
    public function store(ContactRequest $request) {
        $this->contactService->create($request->all());
        flash('Message sent successfully.')->success();

        return redirect()->back();
    }
}
