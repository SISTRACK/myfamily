<?php

namespace Modules\Security\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth:security');
    }
    public function index()
    {
        if(security()->policeStation){
            return view('security::Security.Dashboard.police_dashboard');
        }
        return view('security::Security.Dashboard.court_dashboard');
    }

    public function verify()
    {
        $security = security();
        if($security->policeStation){
            $page = 'police-station';
            $station = str_replace(' ', '-', strtolower($security->policeStation->name));
        }else{
            $page = 'court';
            $station = str_replace(' ', '-', strtolower($security->court->name));
        }
        return redirect()->route('security.dashboard',[$page,$station]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('security::create');
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
        return view('security::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('security::edit');
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
