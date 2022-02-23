<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminValidate
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
        if (Auth::check() && Auth::user()->typeUser=="2") {
            return $next($request);
        }
        return redirect('/');
        // if ($request->input('token') !== '2') {
        //     return redirect('home');
        // }
 
        // return $next($request);
    }
}
