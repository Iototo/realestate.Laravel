<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealestateRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'max:225'],
            'breadth' => ['sometimes', 'integer'],
            'address' => ['sometimes', 'string', 'max:255'],
            'floor_plan' => ['sometimes', 'string', 'max:255'],
            'tenancy_status' => ['sometimes', 'integer', 'max:3'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '物件名',
            'adress' => '住所',
            'breadth' => '広さ',
            'floor_plan' => '間取り',
            'tenancy_status' => '入居状況',
            'user_id' => '物件登録者',
            'created_at' => '作成日時',
            'updated_at' => '更新日時'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributeを入力してください',
            'name.max' => ':attributeは255文字以内で入力してください',
            'adress.required' => ':attributeを入力してください',
            'adress.max' => ':attributeは255文字以内で入力してください',
            'breadth.integer' => ':attributeを正しく入力してください',
            'floor_plan.max' => ':attributeは255文字以内で入力してください',
            'tenancy_status.integer' => ':attributeを正しく入力してください',
            'tenancy_status.max' => ':attributeは255文字以内で入力してください',
            'user_id.required' => ':attributeを入力してください',
            'user_id.max' => ':attributeを正しく入力してください'
        ];
    }
}
