<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        $rules = [
            'user_name'    => 'required|string',
            'postal_code'  => 'required|regex:/^\d{3}-\d{4}$/',
            'address'      => 'required|string',
            'building'     => 'required|string',
        ];

        if ($this->routeIs('purchase.update')) {
            unset($rules['user_name']);
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'user_name.required' => 'ユーザー名を入力してください',
            'postal_code.required' => '郵便番号を入力してください',
            'postal_code.regex' => '郵便番号はハイフンありの8文字で入力してください',
            'address.required' => '住所を入力してください',
            'building.required' => '建物名を入力してください',
        ];
    }
}
