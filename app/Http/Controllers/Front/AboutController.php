<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $view = 'front.about.';

    /**
     * @return Application|Factory|View
     */
    public function index() {
        return view($this->view.'index');
    }
}
