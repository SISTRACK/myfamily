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
        $profile = Profile::where('FID',$request->fid)->first();
        if($profile){
            return redirect()->route('education.school.admission.verification.profile',[$request->route('year'),$profile->id]);
        }
        session()->flash('error',['Invalid Student FID']);
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function viewProfile($year,$profile_id)
    {
        $profile = Profile::find($profile_id);
        return view('education::Education.School.Verification.profile',['years'=>$this->getValidYears(),'user'=>$profile->user]);
    }

    public function getValidYears()
    {
        $years = [];
        for ($i = request()->route('year') ; $i >= request()->route('year') - 10 ; $i-- ) { 
            $years[] = $i;
        }
        return $years;
    }
}
