<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateCustomerRequest extends FormRequest
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
            'name' => 'required|max:50',
            'kana' => 'required|max:50',
            'management_id' => 'required|min:1|max:9000000000000000000|numeric|unique:customers,management_id',
            'birthday' => 'date_format:"Y-m-d"|before:today|nullable',
            'job' => 'max:50|nullable',
            'tel' => 'numeric|digits_between:8,11|nullable',
            'email' => 'nullable|email|max:100',
            'motive' => 'nullable|max:500',
            'where' => 'nullable|max:500',
            'memo' => 'nullable|max:3000',
            'demand' => 'nullable|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048|',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "顧客名は入力必須項目です",
            "kana.required" => "よみがなは入力必須項目です",
            "name.max" => "顧客名は50文字以下で入力して下さい",
            "kana.max" => "よみがなは50文字以下で入力して下さい",
            "management_id.required" => "idは入力必須項目です",
            "management_id.min" => "idは整数の1以上で入力して下さい",
            "management_id.max" => "idは整数の9000000000000000000以下で入力して下さい",
            "management_id.numeric" => "idは数字で入力して下さい",
            "management_id.unique" => "既に同じidが作成されているため、違うidを入力してください",
            "date_format" => "年月日を正しい形で入力して下さい",
            "birthday.before" => "本日以前の日付を入力して下さい",
            "job.max" => "職業は50文字以下で入力して下さい",
            "tel.numeric" => "電話番号は半角数字で入力して下さい",
            "tel.digits_between" => "電話番号を正しい形で入力してください",
            "email" => "メールアドレスは正しい形で入力してください",
            "email.max" => "メールアドレスは100文字以下で入力して下さい",
            "motive.max" => "来店動機は500文字以下で入力して下さい",
            "where.max" => "どこで見つけたか？は500文字以下で入力して下さい",
            "memo.max" => "メモは3000文字以下で入力して下さい",
            "demand.max" => "要望は1000文字以下で入力して下さい",
            "image" => "指定されたファイルが画像ではありません。",
            "image.mines" => "指定された拡張子（PNG/JPG）ではありません。",
            "image.max" => "ファイルのサイズが2Ｍを超えています。",
        ];
    }
}
