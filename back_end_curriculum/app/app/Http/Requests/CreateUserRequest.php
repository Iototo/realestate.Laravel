<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required_with:password'],
            'tel' => ['nullable', 'string', 'min:10', 'max:11'],
            'role' => ['required', 'integer', 'in:1,2'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'アカウント名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード確認',
            'tel' => '電話番号',
            'role' => '権限',
            'created_at' => '作成日時',
            'updated_at' => '更新日時'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributeを入力してください',
            'name.max' => ':attributeは255文字以内で入力してください',
            'email.required' => ':attributeを入力してください',
            'email.max' => ':attributeは255文字以内で入力してください',
            'password.required' => ':attributeを入力してください',
            'password.min' => ':attributeは8文字以上で入力してください',
            'password.confirmed' => 'パスワードとパスワード確認が一致しません',
            'password_confirmation.required_with' => 'パスワード確認を入力してください',
            'tel.required' => ':attributeを入力してください',
            'tel.max' => ':attributeは20文字以内で入力してください',
            'role.required' => ':attributeを選択してください',
            'role.integer' => ':attributeを正しく選択してください',
            'role.in' => ':attributeを正しく選択してください',
        ];
    }

}

