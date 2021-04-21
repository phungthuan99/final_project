<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\setting\AboutRequest;

use App\Models\{News,Category};
use Arr;
use Auth;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        return view('backend.pages.setting.create-about');
    }

    public function store(AboutRequest $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        $data['user_id']=Auth::user()->id;
        $data['type']='about';
        $data['description']= 1;
        $data['image']= 1;
        $data['category_id']= 1;

        News::create($data);

        return redirect()->route('setting.index')->with('thongbao','Thêm trang giới thiệu thành công');
    }

    public function edit($id)
    {
        $data['about'] = News::find($id);
        return view('backend.pages.setting.edit-about',$data);
    }

    public function update(AboutRequest $request,$id)
    {
        $about = News::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $update=Carbon::now()->toarray();

        $about->update($data);

        return redirect()->route('setting.index')->with('thongbao','Cập nhập thành công');

    }
}
