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
        
        $request->validate(['fid' => 'required']);
        $errors = [];
        $profile = Profile::where('FID',$request->fid)->first();
        if(!$profile){
            $errors[] = "Invalid Student FID";
        }
        
        if($profile && $profile->life_status_id == 0){
            $errors[] = "You can't access the ".$request->fid." profile because it has been registered death";
        }

        if(empty($errors)){
            return  redirect()->route('health.hospital.doctor.patient.profile',[$profile->id]);
        }
        
        session()->flash('error',$errors);
        return back();
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
