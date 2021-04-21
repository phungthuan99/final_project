<?php

namespace App\Http\Requests\backend\course;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Course;
class CourseEditRequest extends FormRequest
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
        $course = Course::find((int) end($segments));
        return [
            'course_name'=>'required|unique:courses,course_name,'.$course->id.',id',
            'start_date' =>'required|after:yesterday',
            'finish_date' =>'required|after:start_date',
        ];
    }

    public function messages() 
    {
        return [
            'course_name.required' => 'Không để trống tên khoá học',
            'course_name.unique' => 'Tên khoá học đã tồn tại',

            'start_date.required' => 'Không để trống ngày khai giảng',
            'start_date.after' => 'Không thể chọn ngày trong quá khứ',

            'finish_date.required' => 'Không để trống ngày kết thúc dự kiến',
            'finish_date.after' => 'Ngày kết thúc phải sau ngày khai giảng',
            
        ];
    }
}
