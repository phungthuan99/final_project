<?php

namespace App\Http\Requests\backend\account;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password'=>'required|min:6',
            'cfpassword' => 'required|same:password'

        ];
    }
    public function messages()
    {
        return [
            'password.required'=>'Không được bỏ trống mật khẩu',
            'password.min'=>'Mật khẩu không được dưới 6 ký tự',
            'cfpassword.required'=>'Không được bỏ trống xác nhận mật khẩu',
            'cfpassword.same'=>'Xác nhận mật khẩu không khớp',
        ];
    }
}
