<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplereForm extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        if($this->isMethod('get')) return [];
        return [
            'lead_time' => 'required',
            'image.*.photo' => 'file|mimes:pdf,png,jpg,jpeg,bmp|max:3000',
            //
        ];
    }
}
