<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LandOnStateDashboardMiddleware
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
        $accessibleStates = [];

        $admin = auth()->guard('admin')->user();

        if($admin->state){
            $accessibleStates[] = $admin->state->id;
        }
        
        if($admin->role_id == 1 || in_array($request->route('state_id'), $accessibleStates)){
            return $next($request);
        }
        session()->flash('error',['Sorry you dont have access to the requested State']);
        return back();

    }
}
