<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVisitRequest extends FormRequest
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
            'date' => 'date_format:"Y-m-d"|before:now|required',
            'memo' => 'nullable|max:3000',
        ];
    }

    public function messages()
    {
        return [
            "date_format" => "年月日を正しい形で入力して下さい",
            "date.before" => "本日以前の日付を入力して下さい",
            "date.required" => "来店日時は入力必須です",
            "memo.max" => "メモは3000文字以下で入力して下さい",
        ];
    }
}