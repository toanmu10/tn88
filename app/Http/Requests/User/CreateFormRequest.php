<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'username' => 'required',
            'name'=>'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Vui lòng nhập tên đăng nhập',
            'username.required' => 'Vui lòng nhập tên nguoi dung',
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'role_id.required' => 'Vui lòng nhập  quyền',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone_number.required' => 'Vui lòng nhập số điện thoại',
        ];
    }
}
