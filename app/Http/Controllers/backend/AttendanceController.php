<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Teacher,User,Classes,Schedule,Student,Level,Course};
use Auth;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class AttendanceController extends Controller
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
                if($key == 'name'){
                    $data['levels']=Level::all();
                    $data['courses']=Course::all();
                    $data['classes']=Classes::where("$key",'LIKE',"%$value%")->paginate(10);
                }
                else{
                    $data['levels']=Level::all();
                    $data['courses']=Course::all();
                    $data['classes']=Classes::whereBetween('start_date', array($request->start_date, $request->finish_date))->paginate(10);
                }
            }
        }else{
            $data['levels']=Level::all();
            $data['courses']=Course::where('finish_date', '>' , now())->get();
            $data['classes'] = Classes::where('finish_date', '>' , now())->paginate(10);

        }
        return view('backend.pages.attendance.list-class',$data);
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

        $data['schedules'] = Schedule::where("class_id", $id)->get();
        $data['class'] = Classes::find($id);
        $data['pasts'] = Schedule::where('time','<', now())->where('class_id', $id)->get();

        return view('backend.pages.attendance.schedule',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['schedule'] = Schedule::find($id);
        $data['students'] = Student::where('class_id',Schedule::find($id)->class_id)->get();
        $data['class'] = Classes::find(Schedule::find($id)->class_id);
        // dd(Schedule::find($id)->student_id );
        return view('backend.pages.attendance.attendance',$data);
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
        $schedule = Schedule::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $updated_at=Carbon::now()->toarray();

        // dd($data);

        $data['updated_at']=$updated_at['formatted'];

        $schedule->update($data);
        return redirect()->back()->with('thongbao','Điểm danh thành công');
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