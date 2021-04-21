<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\news\{NewsRequest,NewsEditRequest};

use Str;
use Auth;
use Carbon\Carbon;


use App\Models\{News,Category};

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->all() != null && $request['page'] == null){
            foreach($request->all() as $key => $value){
                if($key == 'title'){
                    $news=News::where("$key",'LIKE',"%$value%")->paginate(10);
                }
                else{
                    $news=News::whereBetween('created_at', array($request->start_date, $request->finish_date))->where('type','new')->OrderBy('created_at','desc')->paginate(10);
                }
            }
        }else{
            $news = News::where('type','new')->OrderBy('created_at','desc')->paginate(6);
        }
        
        return view('backend.pages.news.news',['news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type','news')->get();
        return view('backend.pages.news.create-news',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        $data['user_id']=Auth::user()->id;
        $data['type']='new';
        if ($request->hasFile('image')) {
            $data['image']=$request->file('image')->store('images','public');
        }else{
            $data['image']='noImage.jpg';
        }
        News::create($data);

        return redirect()->route('news.index')->with('thongbao','Thêm tin tức thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['news'] = News::find($id);
        $categories= Category::all();
        return view('backend.pages.news.detail-news',$data,compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $data['news'] = News::find($id);
        $categories= Category::all();
        return view('backend.pages.news.edit-news',$data,compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsEditRequest $request,$id)
    {
        $news = News::find($id);

        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $updated_at=Carbon::now()->toarray();
        $data['updated_at']=$updated_at['formatted'];


        if ($request->hasFile('image')) {
            $data['image']=$request->file('image')->store('images','public');
         }else{
             $data['image']=$news->image;
         }

        $news->update($data);

        return redirect()->route('news.index')->with('thongbao','Cập nhập tin tức thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);


        if($data['status'] == 0){
            $data['status'] = 1;
        }
        else {
            $data['status'] = 0;
        }

        

        $news->update($data);

        return redirect()->back();
    }
}