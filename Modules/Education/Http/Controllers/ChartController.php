<?php

namespace Modules\Education\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function admission()
    {
        return view('education::Chart.admission');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function graduation()
    {
        return view('education::Chart.graduation');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function report()
    {
        return view('education::Chart.report');
    }

    
}
