<?php

namespace App\Http\Requests\backend\account;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class EditAccountRequest extends FormRequest
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
            $user = User::find((int) end($segments));
            if(request('avatar') != $user->avatar){
                $mimes ='|mimes:jpeg,jpg,png';
            }else{
                $mimes ='required';
            }
        return [
            'fullname'=>'required|min:6',
            'email'=>'required|email|',
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
