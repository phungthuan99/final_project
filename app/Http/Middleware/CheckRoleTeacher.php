<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckRoleTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if(Auth::check()){
            if(Auth::User()->role == config('common.role.teacher')){
                return $next($request);
            }else{
                // return redirect()->route('home.teacher');
             return redirect('teacher/login');
            }
        }else{
            return redirect('teacher/login');
        }
    }
}
