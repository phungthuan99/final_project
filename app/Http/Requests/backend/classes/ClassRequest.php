<?php

namespace App\Http\Requests\backend\classes;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
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
            'name' => 'required|unique:classes',
            'start_date' => 'required|after:yesterday',
            'finish_date'=> 'required|after:start_date',
            'course_id'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Không để trống tên lớp',
            'name.unique' => 'Lớp học này đã được tạo',

            'start_date.required' => 'Không để trống ngày khai giảng',
            'start_date.after' => 'Không thể chọn ngày trong quá khứ',

            'finish_date.required' => 'Không để trống ngày kết thúc',
            'finish_date.after' => 'Ngày kết thúc phải sau ngày khai giảng',

            'course_id.required'=> 'Vui lòng tạo khoá trước',
           
        ];
    }
}
