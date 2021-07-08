<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShopRequest extends FormRequest
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
            'shop_name' => 'required|max:50|unique:shops,name',
        ];
    }

    public function messages()
    {
        return [
            "required" => "店舗名は必須項目です",
            "max" => "店舗名は50文字以下で入力して下さい",
            "unique" => "既に同じ店舗名が作成されているため、違う店舗名を入力してください",
        ];
    }
}