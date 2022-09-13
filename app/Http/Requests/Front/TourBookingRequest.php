<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class TourBookingRequest extends FormRequest
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
            'departure_date' => 'required',
            'arrival_date' => 'required',
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
            'departure_date.required' => 'The departure date field is required.',
            'arrival_date.required' => 'The arrival date field is required.',
            'user.*.name.required' => 'The name field is required.',
            'user.*.email.required' => 'The email field is required.',
            'user.*.phone.required' => 'The phone field is required.',
            'user.*.address.required' => 'The address field is required.'
        ];
    }
}
