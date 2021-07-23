<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
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
            'new_email' => 'required|max:100|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            "new_email.required" => "メールアドレスを入力して下さい",
            "new_email.max" => "メールアドレスは100文字以下で入力して下さい",
            "unique" => "既に同じメールアドレスが作成されてます",
        ];
    }
}