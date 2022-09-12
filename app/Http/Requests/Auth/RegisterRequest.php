<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'address' => 'nullable',
            'phone' => 'nullable',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'

        ];
    }
    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'email.required' => 'The email field is required',
            'phone.required' => 'The phone field is required',
            'address.required' => 'The address field is required',
            'password.required' => 'The password field is required',
            'password.confirmed' => 'The confirm password should match to the password',
            'password_confirmation.required' => 'The password confirmation field is required',

        ];
    }
}
