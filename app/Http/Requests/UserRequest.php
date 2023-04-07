<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|max:100',
            'email'=>'required|email|max:255',
            'password'=>'required|min:8|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.max:100' => '名前は100文字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.max:255' => '255文字以内で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min:8' => '8文字以上で入力してください',
            'password.max:255' => '255文字以内で入力してください',
        ];
    }
}
