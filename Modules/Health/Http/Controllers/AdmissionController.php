<?php

namespace Modules\Health\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Health\Entities\Diagnose;
use Modules\Profile\Entities\Profile;
use Modules\Core\Http\Controllers\Health\HealthBaseController;

class AdmissionController extends HealthBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('health::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('health::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function admitPatient(Request $request)
    {   
        $profile = Profile::find($request->profile_id);
        //diagnose the profile base on
        $diagnose = Diagnose::firstOrCreate([
            'medical_condition_id'=>$request->medical_condition_id,
            'infection_id'=>$request->infection_id,
            'treatment_id'=>$request->treatment_id,
        ]);
        // admit the profile base on the diagnose
        $profile->hospitalAdmissions()->create(['diagnose_id'=>$diagnose->id,'doctor_id'=>doctor()->id]);

           session()->flash('message',$profile->user->first_name.' '.$profile->user->last_name.' is successfully admitted in to '.doctor()->hospital->name.' Hospital');
           return  redirect()->route('health.doctor.patient.profile',[$profile->id]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('health::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('health::edit');
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
