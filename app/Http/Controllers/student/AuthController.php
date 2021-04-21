<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\auth\LoginRequest;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class AuthController extends Controller
{
    public function getLoginForm(){
        return view('student.auth.login');
    }

    public function login(LoginRequest $request)
    {
        
        $data = Arr::except($request->all(), ['_token']);
        if ($result = Auth::guard('student')->attempt($data)) {
            if(Auth::guard('student')->user()->status == 0 ){
                return redirect()->route('student.login')->with('danger','Tài Khoản Của Bạn Đã Bị Khóa');
            }else{
                return redirect('student');
            }
            return redirect('student');
        } else {
            return redirect()->back()->with('danger','Bạn Nhập sai tài khoản hoặc mật khẩu');
        }
    }

    public function logout(){
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }
}