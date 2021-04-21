<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\account\PasswordRequest;

use App\Models\Student;
use Arr;
use Auth;
use DB;
use Carbon\Carbon;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
        $data['student'] = Student::find(Auth::guard('student')->user()->id);
        $class_id = Auth::guard('student')->user()->class_id;
        $data['profile'] = Student::find(Auth::guard('student')->user()->id);
        $id = Auth::guard('student')->user()->id;
        $data['feedback'] = DB::table('feedback')
                                ->where('student_id', $id)
                                ->where('class_id', $class_id)
                                ->get();
        $data['sessions'] = DB::table('schedules')
                                ->where('class_id', $class_id)
                                ->whereNotNull('student_id')
                                ->get();
        
        $data['number_of_sessions'] = DB::table('schedules')
                                        ->where('class_id', $class_id)
                                        ->get();
                 
        
        if(count($data['sessions']) <= 2/3 * count($data['number_of_sessions'])){
            return view('student.pages.profile.edit-password',$data);
        }
        else if(count($data['feedback']) > 0){
            return redirect()->route('home.student',$data); 
        }
        else{
            return redirect('student/feedback');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordRequest $request)
    {
        $student = Student::find(Auth::guard('student')->user()->id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $data['password']=bcrypt($data['password']);

        $student->update($data);

        return redirect()->route('student-password.edit',Auth::guard('student')->user()->id)->with('thongbao','Đổi mật khẩu thành công');
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
