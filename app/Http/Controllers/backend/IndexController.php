<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Student,Classes,Course,History_learned_class};

class IndexController extends Controller
{
    public function index(){
        $data['class'] = Classes::all();
        $data['course'] = Course::all();
        $data['student'] = Student::all();
        $data['student_passed'] = History_learned_class::where('score','>', 5)->get();
        return view('backend.pages.index',$data);
    }
}
