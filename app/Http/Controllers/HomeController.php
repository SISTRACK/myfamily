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
            return view('home',['profile'=>Auth()->User()->profile]);
        }
    }
}
