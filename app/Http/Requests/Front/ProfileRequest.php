<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'email' => [
                'required',
                Rule::unique('users')->ignore(getAuthenticatedUser('front'))
            ],
            'address' => 'nullable',
            'phone' => 'nullable',
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
            'email.unique' => 'The given email address already exists',
            'phone.required' => 'The phone field is required',
            'address.required' => 'The address field is required',
            'password.required' => 'The password field is required',
            'password.confirmed' => 'The confirm password should match to the password',
            'password.min' => 'The :attribute must be atleast :min characters',
            'password_confirmation.required' => 'The password confirmation field is required',
        ];
    }
}
