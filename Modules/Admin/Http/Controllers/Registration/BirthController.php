<?php

namespace Modules\Admin\Http\Controllers\Registration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\District;
use Modules\Family\Entities\Family;
use Modules\Birth\Entities\Birth;
use Modules\Birth\Entities\Deliver;
use Modules\Profile\Entities\Desease;
use Modules\Birth\Http\Requests\NewBirthFormRequest;
use Modules\Birth\Services\Register\NewBirth;

class BirthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function createBirth($state,$lga,$district,$id)
    {
        $district = District::find($id);
        return view('admin::Admin.Registration.Birth.create',['district'=>$district]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function verifyFamily(Request $request)
    {
        $request->validate([
            'family' => 'required'
        ]);
        session(['family'=> Family::find($request->family)]);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function registerBirth(NewBirthFormRequest $request)
    {
        $birth = new NewBirth($request->all());
        if(session('error') == null){
            //broadcast(new NewBirthEvent($birth->data))->toOthers();
            session()->forget('family');
            session()->flash('message','Birth is registered successfully');
            return back();
        }
        return back()->withIput();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function editBirth($state,$lga,$dist,$family,$id)
    {
        $birth = Birth::find($id);
        return view('admin::Admin.Registration.Birth.edit',['district'=>$birth->father->husband->profile->family->location->town->district,'birth'=>$birth]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateBirth(NewBirthFormRequest $request, $state,$lga,$dist,$family,$id)
    {
        $birth = Birth::find($id);
        //update mother information
        
        //update delivery information
        $deliver = Deliver::firstOrCreate(['first_name'=>$request->midwifery_name,'last_name'=>$request->midwifery_surname]);
        //update birth information
        $birth->update([
            'place' => $request->place,
            'weight' => $request->weight,
            'date' => strtotime($request->date),
            'deliver_at' => $request->deliver_at,
            'deliver_id' => $deliver->id,
        ]);

        $health = Desease::firstOrCreate(['name'=>$request->health_status]);

        $birth->child->profile->update(['gender_id'=>$request->gender]);

        $birth->child->profile->profileHealth->update(['desease_id'=>$health->id]);

        //update child first name
        $birth->child->profile->user->update(['first_name'=>$request->child_name]);
        session()->flash('message', 'Birth information was successfully updated');
        return back();
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
