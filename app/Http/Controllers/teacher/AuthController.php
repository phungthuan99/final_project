<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Auth;
use Arr;

class AuthController extends Controller
{
    public function getLoginForm(){
        return view('teacher.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        
        if($result = Auth::attempt($data)){
            if(Auth::User()->status == 0 ){
                return redirect()->route('teacher.login')->with('danger','Tài Khoản Của Bạn Đã Bị Khóa');
            }
            else{
                return redirect()->route('home.teacher');
            }
        }else{
            return redirect()->back()->with('danger','Bạn Nhập sai tài khoản hoặc mật khẩu');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('teacher.login');
    }
}
