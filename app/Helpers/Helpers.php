<?php

if (!function_exists('storage_url')) {
    function storage_url($url)
    {
        return blank($url) ? $url : Storage::url($url);
    }
}

if (!function_exists('profile')) {
    function profile()
    {
        $profile = null;
        if(auth()->guard('family')->check()){
            $profile = auth()->guard('family')->user()->profile;
        }
        return $profile;
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        if(!is_null(auth()->user()) && !is_null(auth()->user()->profile->systemAdmin)){
        	return true;
        }else{
        	return false;
        }
    }
}

if(!function_exists('governmentChartPage')){
    function governmentChartPage(){
        $user = auth()->guard('government')->user();
        if($user->lga){
            $status = $user->lga->name." Local Government's";
        }elseif ($user->state) {
            $status = $user->state->name." State's";
        }elseif ($user->district) {
            $status = $user->district->name." District's";
        }
        return $status;
    }
}

if(!function_exists('admin')){
    function admin(){
        return auth()->guard('admin')->user();
    }
}

if(!function_exists('schoolAdmin')){
    function schoolAdmin(){
        return auth()->guard('teacher')->user();
    }
}

if(!function_exists('security')){
    function security(){
        return auth()->guard('security')->user();
    }
}

if(!function_exists('slug')){
    function slug($value){
        return strtolower(str_replace(['/',' ','`'],'-',$value));
    }
}

if(!function_exists('divorced')){
    function divorced(){
        $flag = false;
        foreach (profile()->husband->marriages as $marriage) {
            if($marriage->is_active == 0){
                $flag = true;
            }
        }
        return $flag;
    }
}

if(!function_exists('canDivorce')){
    function canDivorce(){
        $flag = false;
        foreach (profile()->husband->marriages as $marriage) {
            if($marriage->is_active == 1){
                $flag = true;
            }
        }
        return $flag;
    }
}

if (!function_exists('doctor')) {
    function doctor()
    {
        $doctor = null;
        if(auth()->guard('health')->check()){
            $doctor = auth()->guard('health')->user();
        }
        return $doctor;
    }
}

if (!function_exists('dashboardRoute')) {
    function dashboardRoute()
    {
        $route = null;
        if (auth()->guard('family')->check()){
            $route = 'home';
        }elseif (auth()->guard('admin')->check()) {
            $route = 'admin.dashboard';
        }elseif (auth()->guard('government')->check()) {
            $route = 'government.dashboard';
        }elseif (auth()->guard('health')->check()) {
            $route = 'health.dashboard';
        }elseif (auth()->guard('security')->check()) {
            $route = 'security.dashboard';
        }
        return $route;
    }
}

if (!function_exists('government')) {
    function government()
    {
        $government = null;
        if(auth()->guard('government')->check()){
            $government = auth()->guard('government')->user();
        }
        return $government;
    }
}