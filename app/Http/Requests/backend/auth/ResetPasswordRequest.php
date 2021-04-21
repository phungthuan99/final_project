<?php

namespace App\Http\Requests\backend\auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password'=>'required',
            'cfpassword'=>'required|same:password',
        ];
    }


    public function messages()
    {
        return [
            'password.required'=>'Không Được Để Trống Mật Khẩu',
            'cfpassword.required'=>'Không Được Để Trống Xác Nhận Mật Khẩu',
            'cfpassword.same'=>'Mật Khẩu Xác Nhận Không Khớp',
        ];
    }
}
