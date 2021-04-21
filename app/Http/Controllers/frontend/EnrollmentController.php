<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\frontend\EnrollmentRequest;

use App\Models\{Level,Setting,Enrollment};

use Arr;
class EnrollmentController extends Controller
{
    public function getForm()
    {
        
        $data['get_all_level']=Level::all();
        $data['settings'] = Setting::limit(1)->get();
        return view('frontend.enrollment',$data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postForm(EnrollmentRequest $request)
    {
       
        $data = Arr::except($request->all(), ['_token']);
        $data['status']= 0;
        Enrollment::create($data);
        return redirect()->back()->with('thongbao','Bạn đã đăng ký thành công, chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất');
    }
}
