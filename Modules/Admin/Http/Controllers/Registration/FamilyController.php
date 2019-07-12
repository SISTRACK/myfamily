<?php

namespace Modules\Admin\Http\Controllers\Registration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\District;
use Modules\Family\Entities\Tribe;
use Modules\Family\Http\Requests\FamilyFormRequest;
use Modules\Family\Entities\Family;
use Modules\Family\Services\Account\NewFamily;
use Modules\Family\Events\NewFamilyEvent;

class FamilyController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createFamily($state,$lga,$district,$id)
    {
        return view('admin::Admin.Registration.Family.create',['district'=>District::find($id),'tribes'=>Tribe::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function registerFamily(FamilyFormRequest $request)
    {
        $data = $request->all();
        $data['country'] = 'Nigeria';
        if($family = new NewFamily($data)){
            if(session('error') == null){
                //broadcast(new NewFamilyEvent($family->family))->toOthers();
                session()->flash('message','Family account created successfully');
            }
            return back();
        }
    }

    

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function editFamily($state,$lga,$dist,$id)
    {
        return view('admin::Admin.Registration.Family.edit',['family'=>Family::find($id),'tribes'=>Tribe::all()]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateFamily(FamilyFormRequest $request, $state,$lga,$dist,$id)
    {
        $family = Family::find($id);
        $family->update([
            'tribe_id' => $request->tribe,
            'name' => $request->family,
            'title' => $request->title,
        ]);
        $family->location->update([
            'town_id' => $request->town
        ]);
        $family->familyAdmin->profile->user->update([
            'first_name' => $request->name,
            'last_name' => $request->sname,
            'email' => $request->email,
        ]);

        $family->familyAdmin->profile->update([
            'date_of_birth' => strtotime($request->date)
        ]);

        if(!is_null($request->password)){
            $family->familyAdmin->profile->user->update(
                [
                'password' => Hash::make('$request->password'),
                ]
            );
        }

        session()->flash('message','Family information updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroyFamily($state,$lga,$dist,$id)
    {
        $family = Family::find($id);
        foreach($family->profiles as $profile){
            if($profile->husband){
                if($profile->husband->father){
                    foreach($profile->husband->father->births as $birth){
                        if($birth->child->profile->husband){
                            $flag = true;
                        }elseif ($birth->child->profile->wife) {
                            $flag = true;
                        }else{
                            $flag = false;
                        }
                        $birth->child->delete();
                        $birth->delete();
                        $birth->profile->leave->delete();
                        if($flag == false){
                            $birth->profile->delete();
                            $birth->profile->user->delete();
                        }

                    }
                    $profile->husband->father->delete();
                }
                foreach($profile->husband->marriages as $marriage){
                    $marriage->husband->delete();
                    if(is_nan($marriage->wife->profile->family_id)){
                        $marriage->wife->delete();
                    }
                    $marriage->delete();
                }
            }
            if($profile->leave){
                $profile->leave->delete();
            }
            $profile->delete();
            $profile->user->delete();
           
        }
        $family->location->delete();
        $family->delete();
        session()->flash('message','All the information about this family was successfully deleted');
        return back();
    }
}
