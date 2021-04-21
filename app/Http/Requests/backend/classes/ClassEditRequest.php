<?php

namespace App\Http\Requests\backend\classes;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Classes;

class ClassEditRequest extends FormRequest
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
        $class = Classes::find((int) end($segments));

        return [
            'name' => 'required|unique:classes,name,'.$class->id.',id',
            'start_date' => 'required|after:yesterday',
            'finish_date'=> 'required|after:start_date',
        ];
    }
        
    

    public function messages()
    {
        return [
            'name.required'=>'Không để trống tên lớp',
            'name.unique'=>'Tên lớp đã tồn tại',
            'start_date.required' => 'Không để trống ngày khai giảng',
            'start_date.after' => 'Không thể chọn ngày trong quá khứ',
            'finish_date.required' => 'Không để trống ngày kết thúc',
            'finish_date.after' => 'Ngày kết thúc phải sau ngày khai giảng',
           
        ];
    }
}
