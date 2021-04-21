<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{News,Setting,User,Level,Classes,Schedule,Student};
class AboutController extends Controller
{
    public function index()
    {
        $data['news'] = News::where('status', 1 )->where('type','about')->limit(1)->get();
        $data['teachers'] = User::where('role', 4)->get();
        $data['settings'] = Setting::limit(1)->get();
        $data['levels'] = Level::all();
        $data['classes'] = Classes::all();
        $data['schedules'] = Schedule::limit(1)->get();
        $data['students'] = Student::all();
        return view('frontend.about',$data);
    }
}
