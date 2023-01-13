<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('front.auth.passwords.change');
    }

    public function update(ChangePasswordRequest $request)
    {
        $hashedPass = getAuthenticatedUser('front', 'password');
        if (Hash::check($request->old_password, $hashedPass)) {
            getAuthenticatedUser('front')->update(['password' => bcrypt($request->password)]);
            return redirect()->route('front.profile.index');
        } else {
            return redirect()->route('auth.password.index')
                ->with('incorrectOldPass', 'Current password is invalid');
        }
    }
}
