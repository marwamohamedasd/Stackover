<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsGuest
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
        if(!Auth::check()) // لو انت بياناتك مش متخزنة في السيشن  عدي  روح سجل علشان تدخل الموقع
        {
            return $next($request);
        }

        return redirect()->route('question');
    }
}
