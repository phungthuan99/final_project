<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\category\{CategoryRequest,CategoryEditRequest};

use App\Models\Category;

use Arr;
use Str;
use Auth;
use Carbon\Carbon;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {   
    //     if($request->all() != null && $request['page'] == null){
    //         foreach($request->all() as $key => $value){
    //             if($key == 'status'){
    //                 $data['get_all_register'] = Register::where("$key","$value")->paginate(10);
    //             }else{
    //                 $data['get_all_register'] = Register::where("$key",'LIKE',"%$value%")->paginate(10);
    //             }
    //         }
    //     }else{
    //         $data['get_all_register']=Register::paginate(10);
    //     }
    //     return view('backend.pages.register.index',$data);
    // }
    public function index()
    {
            $categories = Category::paginate(10);
            return view('backend.pages.category.category',['categories' => $categories]);
    }
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
    public function store(CategoryRequest $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        $data['user_id']=Auth::user()->id;
        $data['status']=1;
        Category::create($data);

        return redirect()->back()->with('thongbao','Thêm danh mục thành công');
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
    public function update(CategoryEditRequest $request, $id)
    {
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
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index');
    }
}
