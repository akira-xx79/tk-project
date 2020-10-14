<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduction extends FormRequest
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
            'contact_number' => 'required',
            'company_name' => 'required',
            'product_name' => 'required',
            'numcer' => 'required',
            'date' => 'required',
            'comment' => 'max:255',
            'image' => 'required|file|mimes:pdf,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'contact_number' => '受注番号を入力してください。',
            'company_name' => '顧客名の入力',
            'categories' => 'カテゴリーを選択してください。',
            'materiaries' => '材質を選択してください。',
            'product_name' => '製品名/作業内容を入力してください。',
            'numcer' => '数量を入力してください。',
            'date' => '納期を入力してください。',
            'comment' => 'コメント',
            'image' => '図面または画像をのアップロード',
            'create_delivery' => '配送業者',
            'shipment_locations' => '発送場所',
        ];
    }
}
