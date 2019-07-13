<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LandOnGeneralDashboardMiddleware
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
        // $admin = auth()->guard('admin')->user();
        // if($admin->role_id == 1){   
        // }
        // session()->flash('error',['Sorry you dont have access to the General system Dashboard']);
        // return back();

        return $next($request);
    }
}
