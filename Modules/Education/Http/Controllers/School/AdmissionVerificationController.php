<?php

namespace Modules\Education\Http\Controllers\School;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Entities\Profile;
use Modules\Core\Http\Controllers\Education\EducationBaseController;

class AdmissionVerificationController extends EducationBaseController
{ 

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('education::Education.School.Verification.verify');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function verify(Request $request)
    {
        $request->validate(['fid'=>'required']);
        $errors = [];
        $profile = Profile::where('FID',$request->fid)->first();
        if(!$profile){
            $errors[] = "Invalid Student FID";
        }
        
        if($profile && $profile->life_status_id == 0){
            $errors[] = "You can't access the ".$request->fid." profile because it has been registered death";
        }

        if(empty($errors)){
            return redirect()->route('education.school.admission.verification.profile',[$profile->id]);
        }

        session()->flash('error',$errors);
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function viewProfile($profile_id)
    {
        $profile = Profile::find($profile_id);
        return view('education::Education.School.Verification.profile',['years'=>$this->getValidYears(),'user'=>$profile->user]);
    }

    public function getValidYears()
    {
        $years = [];
        for ($i = date('Y') ; $i >= date('Y') - 20 ; $i-- ) { 
            $years[] = $i;
        }
        return $years;
    }
}
