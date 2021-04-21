<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\account\EditAccountRequest;

use Arr;
use Auth;
use App\Models\User;
use Carbon\Carbon;

class AccountController extends Controller
{

    public function show(){
        $data['profile']=User::find(Auth::user()->id);
        return view('backend.pages.account.account',$data);
    }

    public function edit($id){
        $data['profile'] = User::find(Auth::user()->id);
        return view('backend.pages.account.edit-account',$data);
    }

    public function update(EditAccountRequest $request){
        $user = User::find(Auth::user()->id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $updated_at=Carbon::now()->toarray();
        // $data['password']=bcrypt($data['password']);

         if ($data['avatar'] != $user->avatar) {
            $data['avatar'] = $request->file('avatar')->store('images', 'public');
        }

        $data['updated_at']=$updated_at['formatted'];
        $user->update($data);
        return redirect()->route('account.show',Auth::user()->id)->with('thongbao','Đã Sửa Thành Công');
    }
}
