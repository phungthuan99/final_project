<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\auth\LoginRequest;

use App\Models\User;
use App\Models\Student;
use Auth;
use Arr;

class AuthController extends Controller
{
    public function getLoginForm(){
        return view('backend.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = Arr::except($request->all(), ['_token']);

        if($result = Auth::attempt($data)){
            if(Auth::User()->status == 0 ){
                return redirect()->route('auth.login')->with('danger','Tài Khoản Của Bạn Đã Bị Khóa');
            }
            elseif(Auth::user()->role==4){
                return redirect()->route('home.teacher');
            }
            else{
                return redirect('admin');
            }
        }else{
            return redirect()->back()->with('danger','Bạn Nhập sai tài khoản hoặc mật khẩu');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
