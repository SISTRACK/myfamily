<?php

namespace Modules\Education\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Education\Charts\Report;
use Modules\Education\Charts\Admission;
use Modules\Education\Charts\Graduation;

class ChartController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:teacher');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function admission(Admission $admission)
    {
        return view('education::Chart.admission',['admission'=>$admission->createChart()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function graduation(Graduation $graduation)
    {
        return view('education::Chart.graduation',['graduation'=>$graduation->createChart()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function report(Report $report)
    {
        return view('education::Chart.report',['report'=>$report->createChart()]);
    }

    
}
