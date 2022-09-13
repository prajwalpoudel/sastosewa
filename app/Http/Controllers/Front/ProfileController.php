<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ProfileRequest;
use App\Services\General\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private UserService $userService;

    /**
     * ProfileController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index() {
        return view('front.profile.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function edit() {
        $user = getAuthenticatedUser('front');
        return view('front.profile.edit', compact('user'));
    }

    public function update(ProfileRequest $request, $id) {
        $updateData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ];
        $user = $this->userService->update(['id' => decrypt($id)], $updateData);

        return redirect()->route('front.profile.index');
    }
}
