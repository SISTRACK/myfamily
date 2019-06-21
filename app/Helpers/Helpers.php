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

