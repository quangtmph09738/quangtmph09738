<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckNameCateUpdate;
class UpdateCateRequest extends FormRequest
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
            'name' => [
                'required',
                new CheckNameCateUpdate(),
            ],
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Ten danh muc khong duoc de trong',
        ];  
    }
}
