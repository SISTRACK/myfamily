<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->User()->profile != null && Auth()->User()->profile->systemAdmin != null){
            return redirect('/dashboard');
        }else{
            $profile = null;
            if(Auth()->User()->profile->husband == null){
                $profile = Auth()->User()->profile->child->birth->father->husband->profile;
            }else{
                $profile = Auth()->User()->profile;
            }

            return view('home',['profile'=>$profile]);
        }
    }
}
