<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:100',
            'password' => 'required|min:8|max:32',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'role' => 'required|in:'.implode(',', config('common.user.role')),
            'gender' => 'required|in:'.implode(',', config('common.user.gender')),
        ];
    }
    public function messages(){
        return [
            'name.max' => 'Ho ten khong duoc vuot qua 100 ki tu',
            'email.email' => 'Email khong dung dinh dang',
            'email.unique' => 'Email da ton tai',
            'password.min' => 'password toi thieu 8 ki tu',
            'password.max' => 'password toi da 32 ki tu',
            'required' => ':attribute khong dc de trong',
            'role.in' => 'không có tài khoản loại này',
            'gender.in' => 'bạn chỉ được chọn giới tính trong select'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'address' => 'Địa chỉ',
            'role' => 'Tài khoản',
            'gender' => 'Giới tính'
        ];
    }
}
