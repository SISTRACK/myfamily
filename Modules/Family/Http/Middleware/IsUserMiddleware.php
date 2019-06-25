<?php

namespace Modules\Family\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUserMiddleware
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
        if (!auth()->guest("auth:user")) {
            return $next($request);
        }
        $urlLogin = route('family.login');
        return redirect()->guest($urlLogin);
    }
}
