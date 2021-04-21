<?php

namespace App\Http\Controllers\backend;
use App\Models\{Level,Classes,Course};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\level\{LevelRequest,LevelRequestEdit};
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class LevelController extends Controller
{
    public function index(){
        $data['get_all_level']=Level::withcount('CountClass')->paginate(10);
        return view('backend.pages.level.index',$data);
    }

    public function destroy($id){
        Level::destroy($id);
        return redirect()->back()->with('thongbao','Xóa Thành Công');
    }

    public function create(){
        return view('backend.pages.level.create');
    }

    public function store(LevelRequest $request){
        $data = Arr::except($request, ['_token'])->toarray();
        $data['user_id']=Auth::user()->id;
        if ($request->hasFile('image')) {
            $data['image']=$request->file('image')->store('images','public');
        }else{
            $data['image']='noImage.jpg';
        }
        // dd($data);
        Level::create($data);
        return redirect()->back()->with('thongbao','Thêm Level Thành Công');
    }

    public function show(Request $request,$id){
        

        if($request->all() != null && $request['page'] == null){
            foreach($request->all() as $key => $value){
                if($key == 'status'){
                    $data['level'] = Level::find($id);
                   $data['courses']=Course::all();
                    $data['classes']=Classes::where('level_id','=',$id)->where("$key","$value")->paginate(10);
                }else{
                    $data['level'] = Level::find($id);
                    $data['courses']=Course::all();
                    $data['classes']=Classes::where('level_id','=',$id)->where("$key",'LIKE',"%$value%")->paginate(10);
                }
            }
        }else{
            $data['level'] = Level::find($id);
            $data['classes']=Classes::where('level_id','=',$id)->get();
            $data['courses']=Course::all();
        }
        $request->get('course_id');
        return view('backend.pages.level.detail',$data);
    }

    public function edit(Level $level){
        $data['get_level']=$level;
        return view('backend.pages.level.edit',$data);
    }

    public function update(LevelRequestEdit $request,$id){
        $data = Arr::except($request, ['_token','_method'])->toarray();
        $level=Level::find($id);
        if ($request->hasFile('image')) {
            $data['image']=$request->file('image')->store('images','public');
         }else{
             $data['image']=$level->image;
         }
        $level->update($data);
        return redirect()->back()->with('thongbao','Cập Nhật level Thành Công');
    }


}