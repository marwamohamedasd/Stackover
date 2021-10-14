<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())          // لو كلاس لاوث عامل  لوج ان  هوة بيعمب شيك انه داخل مش عامل لو ان حيطلعلك برة
        {

            return $next($request);

        }



            return  redirect()->route('loginform');

    }
}
