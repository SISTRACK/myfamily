<?php

namespace Modules\Education\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EducationController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth:teacher');
    }

    public function verify()
    {
        return redirect()->route('education.dashboard');
    }

    public function index()
    {
        return view('education::Education.dashboard',['teacher'=>schoolAdmin()]);
    }
}
