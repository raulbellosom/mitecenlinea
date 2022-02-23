<?php

namespace App\Http\Middleware;

use App\Models\ReporteDiagnostico;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OwnerValidate
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
        var_dump($request->input('id'));
        die;
        $user = DB::select('select user_id from reporte_diagnosticos where id = ?', [1]);
        if (Auth::check() && Auth::user()->id==$user) {
            return $next($request);
        }
        return redirect('/');
    }
}
