<?php

namespace App\Http\Requests\backend\news;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\News;
class NewsEditRequest extends FormRequest
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
        $news = News::find((int) end($segments));
        if(request('image') != $news->image){
            $mimes ='|mimes:jpeg,jpg,png';
        }else{
            $mimes ='required';
        }
        return [
            'title'=>'required|min:6',
            'description'=>'required|min:6',
            'content'=>'required',
            'image'=>$mimes,
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Không được bỏ trống tiêu đề',
            'title.min'=>'Tên tiêu đề không được dưới 6 ký tự',
            'description.required'=>'Không được bỏ trống mô tả',
            'description.min'=>'Tên mô tả không được dưới 6 ký tự',
            'content.required'=>'Không được bỏ trống nội dung',
            'content.min'=>'nội dung không được dưới 6 ký tự',
            'image.required'=>'Không để trống thumbnail',
            'image.mimes'=>'Không đúng định dạng ảnh',
        ];
    }
}
