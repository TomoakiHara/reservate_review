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
            'reserve_date' => 'required|after:today',
            'reserve_time' => 'required',
            'number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'reserve_date.required' => '予約日を選択してください',
            'reserve_date.after' => '明日以降の日付を選択してください',
            'reserve_time.required' => '予約時間を選択してください',
            'number.required' => '予約人数を選択してください',
        ];
    }
}
