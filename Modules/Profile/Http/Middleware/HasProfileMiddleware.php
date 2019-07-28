<?php

namespace Modules\Profile\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasProfileMiddleware
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
        if(auth()->guard('family')->check() && !auth()->guard('family')->user()->profile){
            return redirect()->route('home');
        }elseif (auth()->guard('admin')->check()) {
            # code...
        }
        return $next($request);
    }
}
