<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShopRequest extends FormRequest
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
            'name' => 'required|max:50|unique:shops,name',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "名前は入力必須項目です",
            "name.max" => "名前は50文字以下で入力して下さい",
            "unique" => "既に同じ店舗名が作成されているため、違う店舗名を入力してください",
        ];
    }
}