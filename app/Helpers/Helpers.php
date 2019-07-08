<?php

if (!function_exists('storage_url')) {
    function storage_url($url)
    {
        return blank($url) ? $url: Storage::url($url);
    }
}

if (!function_exists('profile')) {
    function profile()
    {
        return auth()->user()->profile;
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

