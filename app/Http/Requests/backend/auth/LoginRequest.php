<?php

namespace App\Http\Requests\backend\auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'email.required'=>'Không Được Để Trống Email',
            'email.email'=>'Nhập Sai Định dạng Email',
            'password.required'=>'Không Được Để Trống Password',
        ];
    }
}
