<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CupplyFormRequest extends FormRequest
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
        return [
            'payee' => 'required',
            'image' => '|file|mimes:pdf,png,jpg|max:2048',
            'comment' => 'max:225'
        ];
    }
}
