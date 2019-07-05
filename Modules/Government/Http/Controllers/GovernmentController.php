<?php

namespace Modules\Government\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Charts\ResultChart;
use App\Charts\ResultHighChart;
use App\Charts\ResultFusionChart;
class GovernmentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:government');
        
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(ResultFusionChart $chart)
    {
        return view('government::Government.dashboard',['presidentialChart' => $chart->createChart(),'user'=>auth()->guard('government')->user()]);
    }

    public function verify()
    {
        return redirect()->route('government.dashboard');
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('government::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('government::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('government::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
