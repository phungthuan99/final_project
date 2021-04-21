<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{News,Setting,User,Level,Classes,Schedule};

class ScheduleOpeningController extends Controller
{
    public function index()
    {
        $data['news'] = News::where('status', 1 )->where('type','new')->OrderBy('id','desc')->limit(3)->get();
        $data['teachers'] = User::where('role', 4)->get();
        $data['settings'] = Setting::limit(1)->get();
        $data['levels'] = Level::all();
        $data['classes'] = Classes::where('start_date', '>=', now()->toDateString())->get();
        $data['schedules'] = Schedule::all();
        return view('frontend.schedule-opening',$data);
    }
}
