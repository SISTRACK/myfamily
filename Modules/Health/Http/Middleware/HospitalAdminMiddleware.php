<?php

namespace Modules\Health\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HospitalAdminMiddleware
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
        if(doctor()->role_id == 1){
            return $next($request);
        }
            session()->flash('error',['Sorry this is the administration section you dont have access to that']);
            return back();
    }
}
