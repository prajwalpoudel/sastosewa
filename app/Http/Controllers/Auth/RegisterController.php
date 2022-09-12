<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\General\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    private UserService $userService;

    /**
     * RegisterController constructor.
     * @param UserService $userService
     */
    public function __construct(
        UserService $userService
    )
    {
        $this->middleware('guest:front');
        $this->userService = $userService;
    }

    public function create() {
        return view('front.auth.register');
    }

    public function store(RegisterRequest $request) {
        DB::beginTransaction();
        $user = $this->userService->create(array_merge($request->all(), ['password' => bcrypt($request->input('password'))]));
        $request->session()->regenerate();
        $this->guard()->login($user);
//        return redirect()->intended('/');
        DB::commit();
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('front');
    }
}
