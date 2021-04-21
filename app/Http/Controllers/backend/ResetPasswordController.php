<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\auth\ResetPasswordRequest;

use App\Models\User;

use Carbon\Carbon;
use Mail;

class ResetPasswordController extends Controller
{
    public function getform(){
        return view('backend.auth.forgot-password');
    }

    public function sendCode(Request $request)
    {
        $email = $request->email;

        $checkUser = User::where('email', $email)->first();

        if(!$checkUser){
            return redirect()->back()->with('danger','Email không tồn tại trong hệ thống');
        }

        $code = bcrypt(md5(time().$email));

        $checkUser->code_reset_password = $code;
        $checkUser->time_reset_password = Carbon::now();

        $checkUser->save();
        $url = route('get.resetpassword',['code_reset_password'=> $checkUser->code_reset_password,'email'=>$email]);

        $data = [
            'route'=> $url
        ];

        Mail::send('backend.auth.email', $data,function($message) use ($checkUser) {
	        $message->to($checkUser->email,'Visitor')->subject('Lấy lại mật khẩu!');
	    });

        return redirect()->back()->with('success','Link lấy lại mật khẩu đã được gửi vào email của bạn');
    }

    public function resetform(Request $request)
    {
        $code = $request->code_reset_password;
        $email = $request->email;

        $checkUser = User::where([
            'code_reset_password' => $code,
            'email' => $email
        ])->first();
        if(!$checkUser) {
            return redirect()->back()->with('danger','Đường dẫn lấy lại mật khẩu không đúng vui lòng kiểm tra lại mail');
        }

        return view('backend.auth.reset-password');
    }

    public function changePassword(ResetPasswordRequest $request){
         if($request->password){

            $code = $request->code_reset_password;
            $email = $request->email;
    
            $checkUser = User::where([
                'code_reset_password' => $code,
                'email' => $email
            ])->first();
    
            if(!$checkUser) {
                return redirect()->back()->with('danger','Đường dẫn lấy lại mật khẩu không đúng vui lòng kiểm tra lại mail');
            }

            $checkUser->password = bcrypt($request->password);
            $checkUser->save();
            
            return redirect()->route('auth.login')->with('success','Đổi mật khẩu thành công');

         }
    }
}