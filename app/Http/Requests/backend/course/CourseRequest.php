<?php

namespace App\Http\Requests\backend\course;

use Illuminate\Foundation\Http\FormRequest;


class CourseRequest extends FormRequest
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
            'course_name'=>'required|unique:courses',
            'start_date' =>'required|after:yesterday',
            'finish_date' =>'required|after:start_date',
        ];
    }

    public function messages() 
    {
        return [
            'course_name.required' => 'Không để trống tên khoá học',
            'course_name.unique' => 'Khoá học này đã tồn tại vui lòng kiểm tra lại',

            'start_date.required' => 'Không để trống ngày khai giảng',
            'start_date.after' => 'Không thể chọn ngày trong quá khứ',

            'finish_date.required' => 'Không để trống ngày kết thúc dự kiến',
            'finish_date.after' => 'Ngày kết thúc phải sau ngày khai giảng',
            
        ];
    }
}
