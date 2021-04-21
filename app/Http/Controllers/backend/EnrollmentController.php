<?php

namespace App\Http\Controllers\backend;

use App\Models\{Enrollment,Level};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Arr;
use Str;
use Auth;
use Carbon\Carbon;


class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $data['get_all_level'] = Level::all();
        if($request->all() != null && $request['page'] == null){
            foreach($request->all() as $key => $value){
                if($key == 'status'){
                    $data['get_all_enrollment'] = Enrollment::where("$key","$value")->paginate(10);
                }else{
                    $data['get_all_enrollment'] = Enrollment::where("$key",'LIKE',"%$value%")->paginate(10);
                }
            }
        }else{
            $data['get_all_enrollment']=Enrollment::paginate(10);
        }
        return view('backend.pages.enrollment.index',$data);
    }

    public function destroy(Request $request, $id)
    {
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        $enrollment = Enrollment::find($id);
        if ($request['status'] == 1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        $enrollment->update($data);
        return redirect()->back();
    }


    public function changeStatus(Request $request)
    {
        $enrollment = Enrollment::find($request->id);
        $enrollment->status = $request->status;
        $enrollment->save();
  
        return response()->json(['success'=>'Status change successfully.']);}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create-category');
        
    }

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
        $data['get_enrollment'] = Enrollment::find($id);
        return view('backend.pages.enrollment.edit',$data);
        $data['categories'] = Category::find($id);
        return view('backend.pages.category.edit-category',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = Arr::except($request, ['_token','_method'])->toarray();
        $enrollment=Enrollment::find($id);
        $enrollment->update($data);
        return redirect()->back()->with('thongbao','Cập Nhật Thành Công');
        $categories = Category::find($id);

        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $data['user_id']=Auth::user()->id;
        $updated_at=Carbon::now()->toarray();
        $data['updated_at']=$updated_at['formatted'];

        $categories->update($data);

        return redirect()->back()->with('thongbao','Cập nhật Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
*/}
