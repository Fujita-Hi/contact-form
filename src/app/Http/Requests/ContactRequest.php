<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'addrcode' => ['required', 'string', 'size:8'],
            'addr' => ['required', 'string', 'max:255'],
            'builname' => ['max:255'],
            'content' => ['required', 'string', 'max:255'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.string' => '名前を文字列で入力してください',
            'name.max' => '名前を255文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'addrcode.required' => '郵便番号を入力してください',
            'addrcode.string' => '郵便番号を文字列で入力してください',
            'addrcode.size' => '郵便番号をハイフンを含む8文字で入力してください',
            'addr.required' => '住所を入力してください',
            'addr.string' => '住所を文字列で入力してください',
            'addr.max' => '住所を255文字以下で入力してください',
            'builname.max' => '建物名を255文字以下で入力してください',
            'content.required' => 'ご意見を入力してください',
            'content.max' => 'ご意見を255文字以下で入力してください',
        ];
    }
}
