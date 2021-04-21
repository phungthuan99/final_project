<?php

namespace App\Http\Requests\backend\setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'logo' => 'required|mimes:jpeg,jpg,png',
            'slogan' =>'required|min:10',
            'email'=>'required|email',
            'address'=>'required|min:6',
            'phone' => ['required','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10'],
            'banner' => 'required|mimes:jpeg,jpg,png',
            'welcome' => 'required|min:10',
            'welcome_content' => 'required|min:50',
            'welcome_image' => 'required|mimes:jpeg,jpg,png',
            'breadcrumb' =>'required|mimes:jpeg,jpg,png',
            'fanpage' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'logo.required'=>'Không bỏ trống logo',
            'logo.mimes'=>'Logo không đúng định dạng',
            'slogan.required' => 'Không được để trống slogan',
            'slogan.min'=>'Slogan quá ngắn',

            'email.required'=>'Không được để trống email',
            'email.email'=>'Email không đúng',

            'address.required'=>'Không để trống địa chỉ',
            'address.min'=>'Địa chỉ quá ngắn',
            

            'phone.required' => 'Không được để trống số điện thoại',
            'phone.regex'=>'Số điện thoại không đúng',

            'banner.mimes'=>'Banner không đúng định dạng',
            'banner.required'=>'Banner không được bỏ trống',

            'welcome.required' => 'Không được để trống lời chào',
            'welcome.min'=>'Lời chào quá ngắn',

            'welcome_content.required' => 'Không được để trống nội dung giới thiệu',
            'welcome_content.min'=>'Nội dung giới thiệu quá ngắn',

            'welcome_image.mimes'=>'Ảnh không đúng định dạng',
            'welcome_image.required'=>'Không để trống ảnh',

            'breadcrumb.mimes'=>'Ảnh không đúng định dạng',
            'breadcrumb.mimes'=>'Không dể trống breadcrumb',

            'fanpage.required' => 'Không để trống Fanpage',
        ];
    }
}
