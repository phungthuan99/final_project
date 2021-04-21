<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\setting\{SettingRequest,SettingAddRequest};


use Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\{News,Setting};

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['settings'] = Setting::limit(1)->get();
        $data['abouts'] = News::where('type','about')->limit(1)->get();
        return view('backend.pages.setting.setting',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.setting.create-setting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingAddRequest $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        $data['user_id']=Auth::user()->id;

        if($request->hasFile('logo')){
            $data['logo']=$request->file('logo')->store('images','public');
        }else{
            $data['logo']='noImage.jpg';
        }
        if($request->hasFile('banner')){
            $data['banner']=$request->file('banner')->store('images','public');
        }else{
            $data['banner']='noImage.jpg';
        }
        if($request->hasFile('welcome_image')){
            $data['welcome_image']=$request->file('welcome_image')->store('images','public');
        }else{
            $data['welcome_image']='noImage.jpg';
        }
        if($request->hasFile('breadcrumb')){
            $data['breadcrumb']=$request->file('breadcrumb')->store('images','public');
        }else{
            $data['breadcrumb']='noImage.jpg';
        }
        Setting::create($data);

        return redirect()->route('setting.index')->with('thongbao','Thêm thông tin landingpage thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['setting'] = Setting::find($id);
        return view('backend.pages.setting.edit-setting',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        $settings = Setting::find($id);

        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $updated_at=Carbon::now()->toarray();
        $data['updated_at']=$updated_at['formatted'];


        if ($request->hasFile('logo')) {
            $data['logo']=$request->file('logo')->store('images','public');
        }else{
             $data['logo']=$settings->logo;
        }

        if ($request->hasFile('banner')) {
            $data['banner']=$request->file('banner')->store('images','public');
        }else{
             $data['banner']=$settings->banner;
        }

        if ($request->hasFile('welcome_image')) {
            $data['welcome_image']=$request->file('welcome_image')->store('images','public');
        }else{
             $data['welcome_image']=$settings->welcome_image;
        }

        if ($request->hasFile('breadcrumb')) {
            $data['breadcrumb']=$request->file('breadcrumb')->store('images','public');
        }else{
             $data['breadcrumb']=$settings->breadcrumb;
        }

        $settings->update($data);

        return redirect()->route('setting.index')->with('thongbao','Cập nhật Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}