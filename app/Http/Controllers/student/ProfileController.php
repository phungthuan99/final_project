<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Student;
class ProfileController extends Controller
{
    public function index()
    {   
        $class_id = Auth::guard('student')->user()->class_id;
        $data['profile'] = Student::find(Auth::guard('student')->user()->id);
        $id = Auth::guard('student')->user()->id;

        return view('student.pages.profile.profile',$data);
}
       
}