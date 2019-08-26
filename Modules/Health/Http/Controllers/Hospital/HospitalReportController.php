<?php

namespace Modules\Health\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Health\Charts\AdmissionChart;
use Modules\Health\Charts\DischargeChart;

class HospitalReportController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:health');
    }
    
    public function admission(AdmissionChart $admission)
    {
        return view('health::Hospital.Charts.admission',['admission'=>$admission->createChart()]);
    }

    public function discharge(DischargeChart $discharge)
    {
        return view('health::Hospital.Charts.discharge',['discharge'=>$discharge->createChart()]);
    }
    
}
