<?php

namespace App\Http\Requests\backend\student;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\{Course};
class StudentRequest extends FormRequest
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
        $get_all_course = array();
        foreach (Course::all() as $value) {
            $first_date = strtotime($value->start_date);
            $second_date = strtotime($value->finish_date);
            $datediff = abs($first_date - $second_date);
            $time_allowed = floor($datediff / (60 * 60 * 24) / 10);
            $start_date = strtotime(date("Y-m-d", strtotime($value->start_date)) . " +$time_allowed days");
            $start_date_plus10 = strftime("%Y-%m-%d", $start_date);
            if ($start_date_plus10 >= date('Y-m-d')) {
                $get_all_course[] = $value;
            }
        }
        if(count($get_all_course) !=0 ){
            $required='required';
            $required_waitinglist='';
        }else{
            $required='';
            $required_waitinglist='required';
        }


        return [
            'fullname'=>'required|min:6',
            'email'=>'required|email|unique:students',
            'address'=>'required|min:10',
            'phone' => ['required','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10'],
            // 'class_id'=>$required,
            'date_of_birth'=>'required|date|before:today',
            'avatar'=>'required|mimes:jpeg,jpg,png',
            // 'level_id'=>$required_waitinglist,
            // 'slot_add'=>$required_waitinglist,
            'level_id'=>'required',
            'slot_add'=>'required',

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
            // 'class_id.required'=>'Không được bỏ trống lớp học',
            'date_of_birth.required'=>'Không được bỏ trống ngày sinh',
            'date_of_birth.date'=>'phải đúng định dạng ngày tháng',
            'date_of_birth.before'=>'ngày sinh phải là ngày ở quá khứ',
            'avatar.required'=>'ảnh không được bỏ trống',
            'avatar.mimes'=>'Ảnh phải đúng định dạng jpg , png ,jpeg',
            'level_id.required'=>'Không được bỏ trống level',
            'slot_add.required'=>'Không được bỏ trống slot',
        ];
    }
}