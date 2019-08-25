<?php

namespace Modules\Health\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Entities\Profile;

class PatientController extends Controller
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
        return view('health::Patient.profile',['profile'=>$profile]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function admitPatient(Request $request)
    {
        $request->validate([
            'file'=>'required|image|mimes:jpeg,png,jpg'
        ]);
        $profile = Profile::find($request->id);
        $file = $this->storeFile($request->file,'Nfamily/Profile/Report/Medical/'.$profile->id);
        $profile->medicalReports()->create(['file'=>$file]);
           session()->flash('message','File was successfully added to the patient profile');
           return  redirect('/health');
    }

}
