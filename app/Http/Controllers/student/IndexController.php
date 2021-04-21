<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Notification,Schedule,Student,Classes,History_learned_class};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $class_id = Auth::guard('student')->user()->class_id;

        $data['notifications'] = Notification::where('is_active', 1)->OrderBy('created_at','DESC')->limit(5)->get();


        $id = Auth::guard('student')->user()->id;
        $data['feedback'] = DB::table('feedback')
                                ->where('student_id', $id)
                                ->where('class_id', $class_id)
                                ->get();
   
        $data['sessions'] = Schedule::where('class_id',Auth::guard('student')->user()->class_id)->where('time','<',now())->get();


        if(count($data['sessions']) <= 16){
            return view('student.pages.index',$data);   
        }
        else if(count($data['feedback']) > 0){
            return view('student.pages.index',$data);   
        }
        else{
            return redirect('student/feedback');
        }

    }
public function schedule()
    {
        $schedules=array();
        $data['notifications'] = Notification::where('status', 1)->limit(5)->get();
        if(Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->finish_date > now()){
            $schedules = Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->whereDate('time' , '>=', now())->paginate(10);
        }    
        $data['schedules'] = $schedules;
        $class_id = Auth::guard('student')->user()->class_id;
        $id = Auth::guard('student')->user()->id;
        $data['feedback'] = DB::table('feedback')
                                ->where('student_id', $id)
                                ->where('class_id', $class_id)
                                ->get();
         $data['sessions'] = Schedule::where('class_id',Auth::guard('student')->user()->class_id)->where('time','<',now())->get();


        if(count($data['sessions']) <= 16){
            return view('student.pages.schedule_learn.schedule_learn',$data);
        }
        else if(count($data['feedback']) > 0){
            return view('student.pages.schedule_learn.schedule_learn',$data);   
        }
        else{
            return redirect('student/feedback');
        }
        $data['schedules'] = $schedules;
        return view('student.pages.schedule_learn.schedule_learn',$data);
    }

    public function attendance()
    {
        $data['schedules']=array();
        if(Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->finish_date > now()){
            $data['schedules'] = Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->get();
            $data['pasts'] = Schedule::where('time','<', now())->where('class_id',Student::find(Auth::guard('student')->user()->id)->class_id)->get();
            $sche = null;
            $i = 1;
            foreach(Schedule::where('class_id',Student::find(Auth::guard('student')->user()->id)->class_id)->get() as $value){
                
                if($value->student_id != null){
                    $sche .= $value->student_id.',';
                }
            
            }
        $schedule = rtrim($sche,',');
        $data['notifications'] = Notification::where('status', 1)->limit(5)->get();
        $data['schedule'] = explode(',',$schedule);
        }   
        $class_id = Auth::guard('student')->user()->class_id;
        $id = Auth::guard('student')->user()->id;
        $data['feedback'] = DB::table('feedback')
                                ->where('student_id', $id)
                                ->where('class_id', $class_id)
                                ->get();
                                
        $data['sessions'] = Schedule::where('class_id',Auth::guard('student')->user()->class_id)->where('time','<',now())->get();


        if(count($data['sessions']) <= 16){
            return view('student.pages.attendance.attendance',$data);
        }
        else if(count($data['feedback']) > 0){
            return view('student.pages.attendance.attendance',$data);   
        }
        else{
            return redirect('student/feedback');
        }
        
    }
    public function history_learned_class()
    {
        $data['histories'] = History_learned_class::where('student_id',Auth::guard('student')->user()->id)->get();
        $class_id = Auth::guard('student')->user()->class_id;
        $id = Auth::guard('student')->user()->id;
        $data['feedback'] = DB::table('feedback')
                                ->where('student_id', $id)
                                ->where('class_id', $class_id)
                                ->get();
        $data['sessions'] = Schedule::where('class_id',Auth::guard('student')->user()->class_id)->where('time','<',now())->get();


        if(count($data['sessions']) <= 16){
            return view('student.pages.history.history',$data);
        }
        else if(count($data['feedback']) > 0){
            return view('student.pages.history.history',$data);
        }
        else{
            return redirect('student/feedback');
        }
        
    }
}