<?php

namespace App\Http\Requests\backend\level;

use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
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
            'level'=>'required|numeric|unique:levels',
            'description'=>'required|min:6',
            'fee'=>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'level.required'=>'Không được bỏ trống level',
            'level.numeric'=>'level phải là chữ số',
            'level.unique'=>'level đã tồn tại',
            'description.required'=>'Không được bỏ trống mô tả',
            'description.min'=>'Tên mô tả không được dưới 6 ký tự',
            'fee.required'=>'Không được bỏ trống học phí',
            'fee.numeric'=>'Học phí phải là số',
        ];
    }
}


