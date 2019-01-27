<?php

namespace Modules\Family\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasFamilyMiddleware
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
        if(Auth()->User()->profile()->get()->isEmpty()){
            return redirect('/home');
        }
        return $next($request);
    }
}
