<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    $admin = auth()->guard('admin')->user();
                    if($admin->state){
                        $view = redirect()->route('state.dashboard',[str_replace(' ','-',strtolower($admin->state->name)),$admin->state->id]);
                    }elseif ($admin->lga) {
                        $view = redirect()->route('lga.dashboard',[
                            strtolower(str_replace(' ','-',$admin->lga->state->name)),
                            strtolower(str_replace(' ','-',$admin->lga->name)),
                            $admin->lga->id]);
                    }elseif ($admin->district) {
                        $view = redirect()->route('district.dashboard',[
                            strtolower(str_replace(' ','-',$admin->district->lga->state->name)),
                            strtolower(str_replace(' ','-',$admin->district->lga->name)),$admin->district_id
                            ]); 
                    }else{
                        return redirect()->route('admin.dashboard');
                    }         
                }
                break;
            case 'doctor':
                if (Auth::guard($guard)->check()) {
                  return redirect()->route('health.dashboard');
                }
                break;
            case 'teacher':
                if (Auth::guard($guard)->check()) {
                  return redirect()->route('education.dashboard');
                }
                break; 
            case 'police':
                if (Auth::guard($guard)->check()) {
                  return redirect()->route('security.dashboard');
                }
                break;
            case 'government':
                if (Auth::guard($guard)->check()) {
                  return redirect()->route('government.dashboard');
                }
                break;                
            default:
                if (Auth::guard($guard)->check()) {
                    $member = auth()->guard('family')->user();
                    $page = $member->first_name.' '.$member->last_name;
                    if($member->profile){
                        $page = $member->profile->family->name;
                    }
                    return redirect()->route('home',$page);
                }
                break;
        }
        return $next($request);
    }
}
