<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class TicketBookingRequest extends FormRequest
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
            'user.*.name' => 'required',
            'user.*.email' => 'required',
            'user.*.phone' => 'required',
            'user.*.address' => 'required'
        ];
    }

    /**
     * @return string[]
     */
    public function messages() {
        return [
            'user.*.name.required' => 'The name field is required.',
            'user.*.email.required' => 'The email field is required.',
            'user.*.phone.required' => 'The phone field is required.',
            'user.*.address.required' => 'The address field is required.'
        ];
    }
}
