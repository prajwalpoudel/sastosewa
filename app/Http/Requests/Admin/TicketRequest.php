<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'brand_id' => 'required',
            'from'     => 'required',
            'to'     => 'required',
            'no_of_tickets' => 'required',
            'date' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required'
        ];
    }
}
