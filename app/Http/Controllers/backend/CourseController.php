<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\course\{CourseRequest,CourseEditRequest};

use App\Models\{Course,Classes};

use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class CourseController extends Controller
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
                    $data['courses']=Course::where("$key","$value")->paginate(10);
                }elseif($key == 'course_name'){
                    $data['courses']=Course::where("$key",'LIKE',"%$value%")->paginate(10);
                }
                else{
                    $data['courses']=Course::whereBetween('start_date', array($request->start_date, $request->finish_date))->whereBetween('finish_date', array($request->start_date, $request->finish_date))->paginate(10);
                }
            }
        }else{
            $data['courses'] = Course::paginate(10);
        }


        return view('backend.pages.course.course',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        return view('backend.pages.course.create-course');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $data = Arr::except($request->all(),['_tokent']);
        $data['user_id']=Auth::user()->id;

        Course::create($data);

        return redirect()->route('course.index')->with('thongbao','Tạo khoá học thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['course'] = Course::find($id);
        $data['classes'] = Classes::where('course_id','=',$id)->get();
        return view('backend.pages.course.detail-course',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['course']=Course::find($id);
        return view('backend.pages.course.edit-course',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseEditRequest $request, $id)
    {
        $courses = Course::find($id);

        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $update_at = Carbon::now()->toarray();
        $data['update_at'] = $update_at['formatted'];

        $courses->update($data);

        return redirect()->route('course.index')->with('thongbao','Cập nhật khoá học thành công');
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
