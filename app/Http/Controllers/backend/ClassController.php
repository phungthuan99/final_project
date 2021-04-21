<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\classes\{ClassRequest,ClassEditRequest};

use App\Models\{Classes,Course,Level,User,Student,Schedule};

use Arr;
use Auth;
use Carbon\Carbon;


class ClassController extends Controller
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
                if($key == 'status'){
                    $data['levels']=Level::all();
                    $data['courses']=Course::all();
                    $data['classes']=Classes::where("$key","$value")->paginate(10);
                }
                elseif($key == 'course_id'){
                    $data['levels']=Level::all();
                    $data['courses']=Course::all();
                    $data['classes']=Classes::where("$key",'LIKE',"$value")->paginate(10);
                }
                elseif($key == 'level_id'){
                    $data['levels']=Level::all();
                    $data['courses']=Course::all();
                    $data['classes']=Classes::where("$key",'LIKE',"$value")->paginate(10);
                }
                elseif($key == 'name'){
                    $data['levels']=Level::all();
                    $data['courses']=Course::all();
                    $data['classes']=Classes::where("$key",'LIKE',"%$value%")->paginate(10);
                }
                else{
                    $data['levels']=Level::all();
                    $data['courses']=Course::all();
                    $data['classes']=Classes::whereBetween('start_date', array($request->start_date, $request->finish_date))->whereBetween('finish_date', array($request->start_date, $request->finish_date))->paginate(10);
                }
            }
        }else{
            $data['levels']=Level::all();
            $data['courses']=Course::all();
            $data['classes'] = Classes::paginate(10);
            
        }
        return view('backend.pages.class.class',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $courses = array();

        foreach(Course::all() as $value){
            $first_date = strtotime($value->start_date);
            $second_date = strtotime($value->finish_date);
            $datediff = abs($first_date - $second_date);
            $time_allowed=floor($datediff / (60*60*24)/10);
            $start_date=strtotime(date("Y-m-d", strtotime($value->start_date)) . " +$time_allowed days");
            $start_date_plus10 = strftime("%Y-%m-%d", $start_date);
            if ($start_date_plus10 >= date('Y-m-d')) {
                 $courses[]=$value;
            }
        }
        $data['courses'] = $courses;
        $data['levels'] = Level::all();
        return view('backend.pages.class.create-class',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        $data['user_id'] = Auth::user()->id;
        $data['status'] = '1';
        $data['number_of_sessions'] = 24;
        $data['schedule'] = Schedule::all();

        Classes::create($data);
        return redirect()->route('class.index')->with('thongbao','Thêm lớp thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['students'] = Student::where('class_id','=',$id)->get();
        $data['allstudents'] = Student::all();
        $data['class'] = Classes::find($id);
        $data['users']=User::all();
        $data['pasts'] = Schedule::where('time','<', now())->where('class_id',$id)->get();

        
        $sche = null;
        $i = 1;
        foreach(Schedule::where('class_id',$id)->get() as $value){
            
            if($value->student_id != null){
                $sche .= $value->student_id.',';
            }
           
        }
        $schedule = rtrim($sche,',');
        $data['schedule'] = explode(',',$schedule);

        return view('backend.pages.class.detail-class',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $courses = array();
        foreach(Course::all() as $value){
            $first_date = strtotime($value->start_date);
            $second_date = strtotime($value->finish_date);
            $datediff = abs($first_date - $second_date);
            $time_allowed=floor($datediff / (60*60*24)/10);
            $start_date=strtotime(date("Y-m-d", strtotime($value->start_date)) . " +$time_allowed days");
            $start_date_plus10 = strftime("%Y-%m-%d", $start_date);
            if ($start_date_plus10 >= date('Y-m-d')) {
                 $courses[]=$value;
            }
        }
        $data['courses'] = $courses;
        
        $data['class'] = Classes::find($id);
        $teachers = User::where('role', 4 )->get();
        $levels = Level::all();
        // $courses = Course::all();
        return view('backend.pages.class.edit-class',$data,['levels' => $levels,'courses' => $courses,'teachers'=>$teachers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassEditRequest $request, $id)
    {
        $classes = Classes::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $update_at = Carbon::now()->toarray();
        $data['update_at'] = $update_at['formatted'];
        $classes->update($data);

        return redirect()->route('class.index')->with('thongbao','Cập nhật lớp học thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,$id){
        $class = Classes::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);

        if($data['status'] == 0){
            $data['status'] = 1;
        }
        else {
            $data['status'] = 0;
        }

        $class->update($data);

        return redirect()->back();
    }
}
