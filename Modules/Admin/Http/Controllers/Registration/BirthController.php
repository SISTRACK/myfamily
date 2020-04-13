<?php

namespace Modules\Admin\Http\Controllers\Registration;

use App\User;
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
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function createBirth($state,$lga,$district,$districtId,$familyId)
    {
        $family = Family::find($familyId);
        return view('admin::Admin.Registration.Birth.create',[
            'district'=>$family->location->area->town->district,
            'family'=>$family]);
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
        $family = Family::find($request->family);
        return redirect()->route('district.births.create',[
            $family->location->area->town->district->lga->state->name,
            $family->location->area->town->district->lga->name,
            $family->location->area->town->district->name,
            $family->location->area->town->district->id,
            $family->id
            ]);
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
        $error = [];
        if($request->mother_first_name != $request->mother_last_name){
            $error[] = 'Invalid Mother name and surname selection';
        }

        $user = null;
        foreach (User::where('email',$request->mother_first_name)->get() as $user_mother) {
            $user = $user_mother;
        }
    
        if($user->profile->wife->status->id != $request->mother_status){
            $error[] = 'Invalid Mother status selection';
        }
        $mother = $user->profile->wife->mother()->firstOrCreate([]);
        if(empty($error)){
            $birth = Birth::find($id);
            //update delivery information
            $deliver = Deliver::firstOrCreate(['first_name'=>$request->midwifery_name,'last_name'=>$request->midwifery_surname]);
            //update birth information
            $birth->update([
                'mother_id' => $mother->id,
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
        }
        session()->flash('error',$error);
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
