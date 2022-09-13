<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8|different:old_password',
            'password_confirmation' => 'required'
        ];
    }

    public function messages() {
        return [
            'old_password.required' => 'The old password field is required',
            'password.required' => 'The password field is required',
            'password.confirmed' => 'The confirm password should match to the password',
            'password.different' => 'The :attribute and :other must be different.',
            'password.min' => 'The :attribute must be atleast :min characters',
            'password_confirmation.required' => 'The password confirmation field is required',
        ];
    }
}
