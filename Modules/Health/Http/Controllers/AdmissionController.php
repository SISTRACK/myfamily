<?php

namespace Modules\Health\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Health\Entities\Diagnose;
use Modules\Profile\Entities\Profile;
use Modules\Health\Entities\HospitalAdmission;
use Modules\Health\Entities\DischargeAdmission;
use Modules\Core\Http\Controllers\Health\HealthBaseController;
use Modules\Government\Events\Health\NewStateCitizenInfectionEvent;
use Modules\Government\Events\Health\NewStateCitizenHospitalDischargeEvent;
use Modules\Government\Events\Health\NewStateCitizenHospitalAdmissionEvent;

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
        $admission = $profile->hospitalAdmissions()->create(['diagnose_id'=>$diagnose->id,'doctor_id'=>doctor()->id]);

        event(new NewStateCitizenInfectionEvent($admission));
        event(new NewStateCitizenHospitalAdmissionEvent($admission));
           session()->flash('message',$profile->user->first_name.' '.$profile->user->last_name.' is successfully admitted in to '.doctor()->hospital->name.' Hospital');
           return  redirect()->route('health.hospital.doctor.patient.profile',[$profile->id]);
    }

    
    public function dischargePatient(Request $request)
    {
        $request->validate(['discharge_condition'=>'required']);
        $admission = HospitalAdmission::find($request->admission_id);
        if($admission->dischargeAdmission()){
            $discharge = $admission->dischargeAdmission;
            $discharge->update(['is_active'=>1]);
        }else{
            $discharge = $admission->dischargeAdmission()->create(['doctor_id'=>doctor()->id,'discharge_condition_id'=>$request->discharge_condition]);
        }
        event(new NewStateCitizenHospitalDischargeEvent($discharge));

        switch ($request->discharge_condition_id) {
            case '3':
                event(new NewStateCitizenHospitalBirthEvent($discharge));
                break;
            case '4':
                event(new NewStateCitizenHospitalDeathEvent($discharge));
                
                break;
            default:
                # code...
                break;
        }
        session()->flash('message',$admission->profile->user->first_name.' '.$admission->profile->user->last_name.' is successfully discharged from '.doctor()->hospital->name.' Hospital');
           return  redirect()->route('health.hospital.doctor.patient.profile',[$admission->profile->id]);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     **/

    public function updateAdmission(Request $request, $admission_id)
    {
        $admission = HospitalAdmission::find($admission_id);

        $admission->diagnose()->update([
            'medical_condition_id'=>$request->medical_condition_id,
            'infection_id'=>$request->infection_id,
            'treatment_id'=>$request->treatment_id
        ]);
        session()->flash('message',$admission->profile->user->first_name.' '.$admission->profile->user->last_name.' is successfully admitted in to '.doctor()->hospital->name.' Hospital');
           return  redirect()->route('health.hospital.doctor.patient.profile',[$admission->profile->id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function deleteAdmission($admission_id)
    {
        $admission = HospitalAdmission::find($admission_id);
        $message = $admission->profile->user->first_name.' '.$admission->profile->user->last_name.' admission is successfully deleted from '.doctor()->hospital->name.' Hospital by '.doctor()->first_name.' '.doctor()->last_name;
        $admission->delete();
         session()->flash('message',$message);
           return  redirect()->route('health.hospital.doctor.patient.index');
    }

    public function revisitDischarge($discharge_id)
    {
        $discharge = DischargeAdmission::find($discharge_id);
        $discharge->dischargeRevisits()->create(['discharge_at'=>$discharge->created_at]);
        $discharge->is_active = 0;
        $discharge->save();

        session()->flash('message',$discharge->hospitalAdmission->profile->user->first_name.' '.$discharge->hospitalAdmission->profile->user->last_name.' is successfully admitted in to '.doctor()->hospital->name.' Hospital');
           return  redirect()->route('health.hospital.doctor.patient.profile',[$discharge->hospitalAdmission->profile->id]);
    }
}
