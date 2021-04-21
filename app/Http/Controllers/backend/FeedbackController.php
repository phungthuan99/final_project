<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Feedback,Student,Course,Classes};
use Auth;
use Arr;
use DB;
use Carbon\Carbon;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->all() != null && $request['page'] == null){
            foreach($request->all() as $key => $value){
                if($key == 'course_id'){
                    $data['courses']=Course::all();
                    $data['feedbacks']= DB::table('feedback')
                        ->join('classes', 'feedback.class_id', '=', 'classes.id')
                        ->join('students', 'feedback.student_id', '=', 'students.id')
                        ->where("$key",'LIKE',"$value")->paginate(10);
                
            }
        }
        }else{
            $data['courses']=Course::all();
            $data['feedbacks']= DB::table('feedback')
                        ->join('classes', 'feedback.class_id', '=', 'classes.id')
                        ->join('students', 'feedback.student_id', '=', 'students.id')
                        ->paginate(10);
            $data['classes'] = Classes::all();
        }
        return view('backend.pages.feedback.feedback',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
