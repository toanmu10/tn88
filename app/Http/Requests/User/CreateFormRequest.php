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
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Vui lòng nhập tên nguoi dung',
            'email.required' => 'Vui lòng nhập tên nguoi dung',
            'password.required' => 'Vui lòng nhập tên nguoi dung',

        ];
    }
}
