<?php

namespace App\Http\Requests\backend\user;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\User;

class UserEditRequest extends FormRequest
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
        $segments = request()->segments();
        $users = User::find((int) end($segments));
        if(request('avatar') != $users->avatar){
            $mimes ='|mimes:jpeg,jpg,png';
        }else{
            $mimes ='required';
        }
        return [
            'fullname'=>'required|min:6',
            'email'=>'required|email|unique:users,email,'.$users->id.',id|unique:students,email,'.$users->id.',id',
            'phone'=>'required|numeric|digits:10',
            'date_of_birth'=>'required|date',
            'avatar'=>$mimes,
        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'Không được bỏ trống họ tên',
            'fullname.min'=>'Họ tên không được dưới 6 ký tự',
            'email.required'=>'Không được bỏ trống email',
            'email.email'=>'Email Không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại trên hệ thống!',
            'address.required'=>'Không được bỏ trống địa chỉ',
            'phone.required'=>'Không được bỏ trống số điện thoại',
            'phone.numeric'=>'Số điện thoại phải là chữ số',
            'phone.digits'=>'Số điện thoại phải đúng định dạng',
            'class_id.required'=>'Không được bỏ trống lớp học',
            'date_of_birth.required'=>'Không được bỏ trống ngày sinh',
            'date_of_birth.date'=>'phải đúng định dạng ngày tháng',
            'avatar.mimes'=>'Ảnh phải đúng định dạng jpg , png ,jpeg',
        ];
    }
}
