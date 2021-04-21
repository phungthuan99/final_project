<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\user\{UserRequest,UserEditRequest};

use App\Models\User;
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
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
                    $data['users']=User::where("$key","$value")->paginate(10);
                }else{
                    $data['users']=User::where("$key",'LIKE',"%$value%")->paginate(10);
                }
            }
        }else{
            $data['users'] = User::paginate(10);
        }
    return view('backend.pages.user.user',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.user.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = Arr::except($request->all(),['_token']);
        $data['password'] = bcrypt('123456');
        $data['status']='1';
        if($request->hasFile('avatar')){
            $data['avatar']=$request->file('avatar')->store('images','public');
        }else{
            $data['avatar']='noImage.jpg';
        }

        User::create($data);
        return redirect()->route('user.index')->with('thongbao','Thêm Tài Khoản Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('backend.pages.user.detail',['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        return view('backend.pages.user.edit-user',['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $users = User::find($id);

        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $updated_at=Carbon::now()->toarray();
        $data['updated_at']=$updated_at['formatted'];

        if ($request->hasFile('avatar')) {
            $data['avatar']=$request->file('avatar')->store('images','public');
         }else{
             $data['avatar']=$users->avatar;
         }

        $data['updated_at']=$updated_at['formatted'];
        $users->update($data);

        return redirect()->route('user.index')->with('thongbao','Cập nhật tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // User::destroy($id);
        // return redirect()->route('user.index');
        $user = User::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);

        if($data['status'] == 0){
            $data['status'] = 1;
        }
        else {
            $data['status'] = 0;
        }

        $user->update($data);

        return redirect()->back();
    }
}