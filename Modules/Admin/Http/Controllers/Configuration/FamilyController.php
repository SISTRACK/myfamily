<?php

namespace Modules\Admin\Http\Controllers\Configuration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;

class FamilyController extends Controller
{
    public $errors = [];
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function margeIndex()
    {
        return view('admin::Configuration.Family.Marge.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function verifyMargeFamilies(Request $request)
    {
        $request->validate([
            'father_email' => 'required|email',
            'child_email' => 'required|email',
        ]);
        $this->verifyThisEmailsAndTheirProfiles($request->father_email,$request->child_email);
        if(empty($this->errors)){
            return redirect()->route('admin.config.father.child.family.marge.verify.father',[$request->father_family,$request->child_family]);
        }
        session()->flash('error',$this->errors);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function verifyFatherBaseOnFamily($child_family,$father_family)
    {
        return view('admin::Configuration.Family.Marge.verify');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function searchThisEmail($email)
    {  
        foreach (User::where('email',$email)->get() as $email) {
            return $email;
        }
    }

    public function verifyThisEmailsAndTheirProfiles($father_email,$child_email)
    {
        $child = $this->searchThisEmail($child_email);
        $father = $this->searchThisEmail($father_email);

        if(!$father){
            $this->errors[] = 'Sorry the father email does not exist';
        }

        if(!$father){
            $this->errors[] = 'Sorry the child email does not exist';
        }

        if(empty($this->errors)){
            $this->verifyThisProfilesFamilies($father->profile,$child->profile);
        }

    }

    public function verifyThisProfilesFamilies(Profile $father_profile, Profile $child_profile)
    {
        if(!$father_profile->familyAdmin){
            $this->errors[] = 'Sorry the specify father email does does not belongs to any father';
        }
        if(!$child_profile->familyAdmin){
            $this->errors[] = 'Sorry the specify child email does does not belongs to any father';
        }
        if(empty($this->errors)){
            session(['father_profile'=>$father_profile,'child_profile'=>$child_profile]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
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
