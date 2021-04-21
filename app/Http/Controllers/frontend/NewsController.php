<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\News;
use App\Models\Setting;

class NewsController extends Controller
{
    public function index(){
        $settings = Setting::limit(1)->get();

        $news = News::where('type','new')->where('status',1)->OrderBy('created_at','desc')->paginate(6);
        return view('frontend.news',['news' => $news,'settings' => $settings]);
    }

    public function getNews($id){
        $settings = Setting::limit(1)->get();
        $news = News::where('id','=',$id)->get();
        $relaNews = News::where('id','!=',$id)->where('type','new')->where('status' , 1)->orderBy('created_at','desc')->limit(3)->get();

        $new = 'news' . $id;
        
        if (!Session::has($new)) {
            News::where('id', $id)->increment('view');
            Session::put($new, 1);
        }

        $new = News::find($id);


        return view('frontend.news-detail',['news'=> $news, 'news_id'=>$id,'relaNews'=>$relaNews,'settings' => $settings]);
    }

}