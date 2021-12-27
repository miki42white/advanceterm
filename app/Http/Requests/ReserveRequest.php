<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
        'date' => 'required',
        'time' => 'required|between:09:00,20:00',
        'number' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'date.required'=>'日付を入力してください',
            'time.required'=>'時間を入力してください',
            'time.between'=>'9時から20時で入力してください',
            'number.required'=>'人数を入力してください',
        ];
    }
}
