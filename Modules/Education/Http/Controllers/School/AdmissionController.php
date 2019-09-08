<?php

namespace Modules\Education\Http\Controllers\School;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Profile\Entities\Profile;
use Modules\Education\Entities\Admitted;
use Modules\Government\Events\Education\School\NewAdmissionEvent;
use Modules\Core\Http\Controllers\Education\EducationBaseController;

class AdmissionController extends EducationBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $admissions = [];
        foreach(schoolAdmin()->school->admitteds as $admission){
            if($admission->year == request()->route('year')){
                $admissions[] = $admission;
            }
        }
        return view('education::Education.School.Admission.index',['admissions'=>$admissions,'years'=>$this->getValidYears()]);
    }
    public function getValidYears()
    {
        $years = [];
        for ($i = request()->route('year') ; $i >= request()->route('year') - 10 ; $i-- ) { 
            $years[] = $i;
        }
        return $years;
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('education::Education.School.Admission.create',['years'=>$this->getValidYears()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'profile_id'=>'required',
            'admission_no'=>'required|unique:admitteds'
        ]);
        $errors = [];
        //is this profile exist
        $profile = Profile::find($request->profile_id);
        if(!$profile){
            $errors[] = 'Invali Student Profile ID';
        }
        if($profile && !schoolAdmin()->school->validateThisProfileAdmission($profile->id)){
            $errors[] = 'Sorry we already admitted this student in this school';
        }
        if(empty($errors)){
            $profile->admitteds()->create([
                'school_id'=>schoolAdmin()->school->id,
                'admission_no' => $request->admission_no,
                'year' => $request->year,
                'teacher_id' => schoolAdmin()->id
            ]);
            event(new NewAdmissionEvent($profile))
            session()->flash('message','Congratulation the admission is created success fully');
        }else{
            session()->flash('error',$errors);
            return back();
        }
        return redirect()->route('education.school.admission.index',[$request->year]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $year, $admission_id)
    {
        $request->validate([
            'profile_id'=>'required',
            'admission_no'=>'required'
        ]);
        //is this profile exist
        $profile = Profile::find($request->profile_id);
        if($profile){
            Admitted::find($admission_id)->update([
                'school_id'=>schoolAdmin()->school->id,
                'admission_no' => $request->admission_no,
                'year' => $request->year,
                'teacher_id' => schoolAdmin()->id
            ]);
            session()->flash('message','Congratulation the admission is updated success fully');
        }else{
            session()->flash('error',['Invali Student Profile ID']);
        }
        return redirect()->route('education.school.admission.index',[$request->year]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($year, $admission_id)
    {
        Admitted::find($admission_id)->delete();
        session()->flash('message','Congratulation the admission is deleted success fully');
        return back();
    }
}
