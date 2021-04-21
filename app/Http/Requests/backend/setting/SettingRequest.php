<?php

namespace App\Http\Requests\backend\setting;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Setting;
class SettingRequest extends FormRequest
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
        $settings = Setting::find((int) end($segments));
        if(request('banner') != $settings->banner){
            $mimes ='|mimes:jpeg,jpg,png';
        }else{
            $mimes ='required';
        }
        
        if(request('logo') != $settings->logo){
            $logo ='|mimes:jpeg,jpg,png';
        }else{
            $logo ='required';
        }

        if(request('welcome_image') != $settings->welcome_image){
            $welcome_image ='|mimes:jpeg,jpg,png';
        }else{
            $welcome_image ='required';
        }

        if(request('breadcrumb') != $settings->breadcrumb){
            $breadcrumb ='|mimes:jpeg,jpg,png';
        }else{
            $breadcrumb ='required';
        }

        return [
            'logo' => $logo,
            'slogan' =>'required|min:10',
            'email'=>'required|email',
            'phone' => 'required|min:10|max:10',
            'banner' => $mimes,
            'welcome' => 'required|min:10',
            'welcome_content' => 'required|min:50',
            'welcome_image' => $welcome_image,
            'breadcrumb' =>$breadcrumb,
            'fanpage' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'logo.mimes'=>'Logo không đúng định dạng',

            'slogan.required' => 'Không được để trống slogan',
            'slogan.min'=>'Slogan quá ngắn',

            'email.required'=>'Không được để trống email',
            'email.email'=>'Email không đúng',

            'phone.required' => 'Không được để trống phone',
            'phone.min'=>'Số điện thoại không đúng',
            'phone.max'=>'Số điện thoại không đúng',

            'banner.mimes'=>'Banner không đúng định dạng',

            'welcome.required' => 'Không được để trống lời chào',
            'welcome.min'=>'Lời chào quá ngắn',

            'welcome_content.required' => 'Không được để trống nội dung giới thiệu',
            'welcome_content.min'=>'Nội dung giới thiệu quá ngắn',

            'welcome_image.mimes'=>'Ảnh không đúng định dạng',

            'breadcrumb.mimes'=>'Ảnh không đúng định dạng',
            
            'fanpage.required' => 'Không để trống Fanpage',
        ];
    }
}