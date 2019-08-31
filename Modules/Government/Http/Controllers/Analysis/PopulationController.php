<?php

namespace Modules\Government\Http\Controllers\Analysis;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Government\Entities\Month;
use Modules\Government\Entities\Year;

class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('government::Analysis.Population.index',['years'=>Year::all(),'months'=>Month::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function showResult()
    {
        return view('government::Analysis.Population.result');
    }

    public function search(Request $request)
    {
        dd($request->all());
    }

    

}
