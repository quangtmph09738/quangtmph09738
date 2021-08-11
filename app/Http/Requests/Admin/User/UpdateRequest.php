<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\EmailUpdateUser;
class UpdateRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                new EmailUpdateUser(),
            ],
            'address' => 'required',
            'role' => 'required|in:'.implode(',', config('common.user.role')),
            'gender' => 'required|in:'.implode(',', config('common.user.gender')),
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'name.max' => 'tên dưới 100 kí tự',
            'password.min' => 'mật khẩu trên 8 kí tự',
            'password.max' => 'mật khẩu phải dưới 32 kí tự',
            'email.email' => 'email không đúng định dạng',
            'email.unique' => 'email đã tồn tại',
            'role.in' => 'không có tài khoản loại này',
            'gender.in' => 'bạn chỉ được chọn giới tính trong select'
        ];
    }
    public function attributes(){
        return [
            'name' => 'tên',
            'password' => 'mật khẩu',
            'email' => 'email',
            'role' => 'tài khoản phân cấp',
            'gender' => 'giới tính'
        ];
    }
}
