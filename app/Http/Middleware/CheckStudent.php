<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckStudent
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
        if(Auth::guard('student')->check()==false){
            return redirect()->route('student.login');
        }else{
            return $next($request);
        }
    }
}
