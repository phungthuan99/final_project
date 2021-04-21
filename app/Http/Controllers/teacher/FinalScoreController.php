<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{User,History_learned_class,Classes,Student,Level};
use Auth;
use Arr;
use Carbon\Carbon;

class FinalScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['classes'] = Classes::where('teacher_id', Auth::user()->id)->get();
        return view('teacher.pages.score.score',$data);
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
        $data = Arr::except($request->all(), ['_token']);
        if($data['score'] > 5){
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }
        History_learned_class::create($data);
        return redirect()->back()->with('thongbao','Nhập điểm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['class'] = Classes::find($id);
        $data['students'] = Student::where('class_id', $id)->get();
        $data['scores'] = History_learned_class::all();

        $data['history'] = History_learned_class::all();
        if ($data['history'] != null) {
            $student = array();
            foreach ($data['history'] as $value) {
                if (array_search($value->student_id, $student) === false) {
                    $student[] = $value->student_id;
                }
            }
            $data['history'] = $student;
        }
        return view('teacher.pages.score.class_list',$data);
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
        $score = History_learned_class::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $update_at = Carbon::now()->toarray();
        $data['update_at'] = $update_at['formatted'];
        $score->update($data);

        return redirect()->back()->with('thongbao','Nhập điểm thành công');

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
