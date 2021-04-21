<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{News,Setting,User,Level,Student};


class HomeController extends Controller
{
    public function index(){
        $data['news'] = News::where('status', 1 )->where('type','new')->OrderBy('id','desc')->limit(3)->get();
        $data['teachers'] = User::where('role', 4)->get();
        $data['settings'] = Setting::limit(1)->get();
        $data['levels'] = Level::all();
        $data['students'] = Student::all();
        return view('frontend.home', $data);
    }
}
