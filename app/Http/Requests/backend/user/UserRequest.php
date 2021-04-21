<?php

namespace App\Http\Requests\backend\user;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'=>'required|email|unique:users|unique:students',
            'address'=>'required|min:10',
            'phone' => ['required','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10'],
            'date_of_birth'=>'required|date',
            'avatar'=>'required|mimes:jpeg,jpg,png',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'Không được bỏ trống họ tên',
            'fullname.min'=>'Họ tên không được dưới 6 ký tự',
            'email.required'=>'Không được bỏ trống email',
            'email.email'=>'Email Không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại!',
            'address.required'=>'Không được bỏ trống địa chỉ',
            'address.min'=>'Địa chỉ không được dưới 10 ký tự',
            'phone.required'=>'Không được bỏ trống số điện thoại',
            'phone.regex'=>'Số điện thoại không hợp lệ',
            'phone.digits'=>'Số điện thoại phải đúng định dạng',
            'class_id.required'=>'Không được bỏ trống lớp học',
            'date_of_birth.required'=>'Không được bỏ trống ngày sinh',
            'date_of_birth.date'=>'phải đúng định dạng ngày tháng',
            'avatar.required'=>'Ảnh không được bỏ trống',
            'avatar.mimes'=>'Ảnh phải đúng định dạng jpg , png ,jpeg',
        ];
    }
}
