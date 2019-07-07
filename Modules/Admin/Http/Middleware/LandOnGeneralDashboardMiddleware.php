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
        $admin = auth()->guard('admin')->user();
        if($admin->lga_id == null && $admin->state_id == null && $admin->district_id == null){
            return $next($request);
        }
        session()->flash('error',['Sorry you dont have access to the General system Dashboard']);
        return back();
    }
}
