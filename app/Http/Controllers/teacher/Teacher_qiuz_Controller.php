<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Classes,Course,Level,Schedule};
use Arr;
use Auth;
use Carbon\Carbon;

class Teacher_qiuz_Controller extends Controller
{
    public function index(){
        $data['class']=Classes::where([ ['teacher_id',Auth::user()->id],['finish_date','>',now()]  ])->withcount('CountStuden')->paginate(10);
        return view('teacher.pages.select_calass',$data);
    }
}
