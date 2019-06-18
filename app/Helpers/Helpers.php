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

