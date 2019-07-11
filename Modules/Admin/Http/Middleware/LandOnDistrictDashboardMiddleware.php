<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LandOnDistrictDashboardMiddleware
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
        $accessibleDistricts = [];

        $admin = auth()->guard('admin')->user();
        
        if($admin->role_id > 1 && $admin->state){
            foreach ($admin->state->lgas as $lga) {
                foreach ($lga->districts as $district) {
                    $accessibleDistricts[] = $district->id;
                }
            }
        }

        if($admin->lga){
            foreach ($admin->lga->districts as $district) {
                $accessibleDistricts[] = $district->id;
            }
        }
        
        if($admin->role_id == 1 || $admin->district_id == $request->route('district') || in_array($request->route('district'), $accessibleDistricts)){
            return $next($request);
        }
        session()->flash('error',['Sorry you dont have access to the requested District']);
        return back();
       
    }
}
