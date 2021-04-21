<?php

namespace App\Http\Requests\backend\setting;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'title' => 'required|min:6',
            'content' => 'required|min:50'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Không để trống tiêu đề',
            'title.min' => 'Tiêu đề quá ngắn phải trên 6 ký tự',
            'content.required' => 'Không để trống nội dung',
            'content.min' => 'Nội dung quá ngắn phải trên 50 ký tự'
        ];
    }
}
