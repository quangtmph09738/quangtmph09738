<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProRequest extends FormRequest
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
            'name' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống !',
            'img.image' => 'vui long chỉ chọn ảnh mục này',
            'img.mimes' => 'ảnh định dạng jpeg, png, jpg',
            'img.max' => 'dung lượng ảnh nhỏ hơn 2Mb'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên sản phẩm',
            'img' => 'Ảnh',
            'price' => 'Giá sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'category_id' => 'Danh mục',
            'quantity' => 'Số lượng',
        ];
    }
}
