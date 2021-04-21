<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Arr;
use Auth;
use DB;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Course;
use App\Models\Level;
use App\Models\Revenue;
use Carbon\Carbon;

class RevenueController extends Controller
{

    public function index(Request $request){
        $data['courses']=Course::all();
            if ($request->all() != null && $request['page'] == null) {
                foreach ($request->all() as $key => $value) {
                    if ($key == 'course_id') {
                        $data['course_name'] = Course::where('id',$value)->first();
                        $data['get_all_classes'] = Classes::where('course_id', $data['course_name']->id)->get();
                        $data['level_total'] = Revenue::where("course_id",$data['course_name']->id)->first();
                        if($data['level_total'] == null){
                            $data['name'] = 0;
                        }
                        else{
                            $data['level_id'] = json_decode($data['level_total']->level_fee);
                            foreach ($data['level_id'] as $key => $value) {
                                $level_name[] = Level::where('id',$key)->get();
                                foreach ($level_name as $key1 => $value1) {
                                    foreach ($value1 as $key2 => $value2) {
                                        $data['name'][$key] = $value2;
                                    }
                                }
                            }
                        }    
                    }  
                }   
            } 
            else {
                $data['course_name'] = Course::orderBy('id','desc')->first();
                $data['get_all_classes'] = Classes::where('course_id', $data['course_name']->id)->get();
                $data['level_total'] = Revenue::where("course_id",$data['course_name']->id)->first();
                if($data['level_total'] == null){
                    $data['name'] = 0;
                }
                else{
                    $data['level_id'] = json_decode($data['level_total']->level_fee);
                    foreach ($data['level_id'] as $key => $value) {
                        $level_name[] = Level::where('id',$key)->get();
                        foreach ($level_name as $key1 => $value1) {
                            foreach ($value1 as $key2 => $value2) {
                                $data['name'][$key] = $value2;
                            }
                        }
                    }
                }
            }
                return view('backend.pages.revenue.index',$data);                   
                 
        }
             
    public function post(Request $request) {

		$schedule_id  = $request->schedule_id;
		$data = json_decode($request->data, true);
		$currentTime = date('Y-m-d H:i:s');
		$currentDate = date('Y-m-d');

		//Them moi.
		foreach ($data as $item) {
			DB::table('attendance')->insert([
					'student_id'     => $item['student_id'],
					'status'     => $item['status'],
					'created_at' => $currentTime,
					'updated_at' => $currentTime
				]);
		}
		return redirect()->route('attendence.index');
	}   

}
    

