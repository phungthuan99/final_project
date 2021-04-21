<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $data['profile'] = User::find(Auth::user()->id);
        return view('teacher.pages.profile.profile',$data);
    }
}
