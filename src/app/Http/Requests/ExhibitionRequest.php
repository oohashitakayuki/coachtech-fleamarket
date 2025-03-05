<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'name' => 'required|string',
            'image' => 'required|file|image|mimes:jpeg,png',
            'brand' => 'required|string',
            'description' => 'required|string|max:255',
            'categories' => 'required',
            'condition' => 'required',
            'price' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'image.required' => '商品画像を選択してください',
            'image.mimes' => '商品画像は拡張子が.jpegもしくは.pngの画像ファイルを選択してください',
            'brand.required' => 'ブランド名を入力してください',
            'description.required' => '商品の説明を入力してください',
            'description.max' => '商品の説明は255文字以内で入力してください',
            'categories.required' => 'カテゴリーを選択してください',
            'condition.required' => '商品の状態を選択してください',
            'price.required' => '販売価格を入力してください',
            'price.min' => '販売価格は0円以上で入力してください',
        ];
    }
}
