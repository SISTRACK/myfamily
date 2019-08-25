<?php

namespace Modules\Health\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Entities\Profile;
use Modules\Core\Http\Controllers\Health\HealthBaseController;

class PatientController extends HealthBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('health::Patient.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function verify(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|integer'
        ]);
        $profile = Profile::find($request->profile_id);
        if(is_null($profile)){
            session()->flash('error',['Invalid Profile ID']);
            return back()->withInput();
        }
        return  redirect()->route('health.doctor.patient.profile',[$profile->id]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function profile($profile_id)
    {
        $profile = Profile::find($profile_id);
        return view('health::Patient.profile',['profile'=>$profile]);
    }

}
