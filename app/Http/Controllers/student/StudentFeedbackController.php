<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\{Student,Feedback,Notification,User,Schedule};

class StudentFeedbackController extends Controller
{
    public function getFormFeedback()
    {  
        $data['notifications'] = Notification::where('status', 1)->limit(5)->get();

        $class_id = Auth::guard('student')->user()->class_id;
        $teacher_info = DB::table('users')
            ->join('classes', 'classes.teacher_id', '=', 'users.id')
            ->where('classes.id', $class_id)
            ->select('teacher_id','fullname','email','phone','avatar')
            ->first();
        $id = Auth::guard('student')->user()->id;
        $data['feedback'] = DB::table('feedback')
                                ->where('student_id', $id)
                                ->where('class_id', $class_id)
                                ->get();
        $data['sessions'] = Schedule::where('class_id',Auth::guard('student')->user()->class_id)->where('time','<',now())->get();


        if(count($data['sessions']) <= 16){
            return redirect()->route('home.student',$data); 
        }
        else if(count($data['feedback']) > 0){
            return redirect()->route('home.student',$data); 
        }
        else{
            $data['teacher_info'] = DB::table('users')
            ->join('classes', 'classes.teacher_id', '=', 'users.id')
            ->where('classes.id', $class_id)
            ->select('teacher_id','fullname','email','phone','avatar')
            ->first();
            
            return view('student.pages.feedback.feedback',$data);
        }
        
    }  
    public function postFormFeedback(Request $request)
    {
        $data = Arr::except($request->all(),['_token']);
        Feedback::create($data);
        return redirect()->route('home.student');
        
    }  
}
 