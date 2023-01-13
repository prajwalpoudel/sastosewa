<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'page_title' => 'required',
            'page_id' => 'required'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'page_title' => 'page title',
            'page_id' => 'page id'
        ];
    }
}
