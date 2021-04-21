<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
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
            'fullname'=>'required|min:6',
            'email'=>'required|email|unique:enrollments|unique:users|unique:students',
            'address' => 'required|min:6',
            'phone' => ['required','unique:enrollments','unique:users','unique:students','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10'],
            'date_of_birth'=> 'required',
            'level_id'=>'required',
            'slot'=>'required'

        ];
    }
    
    public function messages()
    {
        return [
            'fullname.required'=>'Vui lòng nhập họ tên',
            'fullname.min'=>'Vui lòng nhập đúng họ tên',

            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email Không đúng định dạng!',
            'email.unique'=>'Email đã đăng ký',

            'address.required'=>'Vui lòng nhập địa chỉ',
            'address.min'=>'Vui lòng nhập đúng địa chỉ',

            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Số điện thoại không đúng',
            'phone.unique'=> 'Số điện thoại đã đăng ký',

            'date_of_birth.required'=> 'Vui lòng chọn ngày sinh',

            'level_id.required'=>'Vui lòng chọn level',

            'slot.required'=>'Vui lòng chọn ca học'
        ];
    }
}
