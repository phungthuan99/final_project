<?php

namespace App\Http\Requests\backend\student;
use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequestEdit extends FormRequest
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
        $Student = Student::find((int) end($segments));
        if(request('avatar') != $Student->avatar){
            $mimes ='|mimes:jpeg,jpg,png';
        }else{
            $mimes ='required';
        }
        return [
            'fullname'=>'required|min:6',
            'email'=>'required|email|unique:students,email,'.$Student->id.',id',
            'address'=>'required|min:10',
            'phone' => ['required','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10'],
            'class_id'=>'required',
            'date_of_birth'=>'required|date|before:today',
            'avatar'=>$mimes,

        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'Không được bỏ trống họ tên',
            'fullname.min'=>'họ tên không được dưới 6 ký tự',
            'email.required'=>'Không được bỏ trống email',
            'email.email'=>'Email Không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại!',
            'address.required'=>'Không được bỏ trống địa chỉ',
            'address.min'=>'địa chỉ không được dưới 10 ký tự',
            'phone.required'=>'Không được bỏ trống số điện thoại',
            'phone.numeric'=>'số điện thoại phải là chữ số',
            'phone.digits'=>'số điện thoại phải là 10 số',
            'phone.regex'=>'số điện thoại phải đúng định dạng',
            'class_id.required'=>'Không được bỏ trống lớp học',
            'date_of_birth.required'=>'Không được bỏ trống ngày sinh',
            'date_of_birth.date'=>'phải đúng định dạng ngày tháng',
            'date_of_birth.before'=>'ngày sinh phải là ngày ở quá khứ',
            'avatar.required'=>'ảnh không được bỏ trống',
            'avatar.mimes'=>'Ảnh phải đúng định dạng jpg , png ,jpeg',
        ];
    }
}
