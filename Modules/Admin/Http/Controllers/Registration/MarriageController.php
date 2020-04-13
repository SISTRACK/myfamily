<?php

namespace Modules\Admin\Http\Controllers\Registration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\District;
use Modules\Family\Entities\Tribe;
use Modules\Family\Entities\Family;
use Modules\Marriage\Entities\WifeStatus;
use Modules\Marriage\Entities\Marriage;
use Modules\Address\Entities\Country;
use Modules\Address\Services\LivingAddress;
use Modules\Marriage\Events\NewMarriageEvent;
use Modules\Marriage\Http\Requests\MarriageFormRequest;
use Modules\Marriage\Register\Marriage\MarriageRegistered;

class MarriageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    use LivingAddress;
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public $data;

    public function createMarriage($state,$lga,$district,$districtId,$familyId)
    {

        return view('admin::Admin.Registration.Marriage.create',[
            'country'=>Country::find(1),
            'district'=>District::find($districtId),
            'family'=>Family::find($familyId),
            'tribes'=>Tribe::all(),
            'statuses'=>WifeStatus::all()
            ]);
    }

    public function verifyMarriageFamily(Request $request)
    {
        $request->validate([
            'family' => 'required',
            'status'=> 'required'
        ]);
        $family = Family::find($request->family);
        session(['register'=>$request->all()]);
        return redirect()->route('district.marriages.create',[
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
    public function registerMarriage(MarriageFormRequest $request)
    {
        if(new MarriageRegistered($request->all()) && session('error') == null){
            //broadcast(new NewMarriageEvent($this->marriage))->toOthers();
            session()->forget('register');
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function editMarriage($state,$lga,$dist,$town,$family,$id)
    {   
        $marriage = Marriage::find($id);
        return view('admin::Admin.Registration.Marriage.edit',['marriage'=>$marriage,'statuses'=>Status::all(),'district'=>$marriage->husband->profile->family->location->town->district]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateMarriage(MarriageFormRequest $request, $state,$lga,$dist,$town,$family,$id)
    {
        $this->data = $request->all();
        $marriage = Marriage::find($id);
        $address_id = $this->address();
        $marriage->wife->profile->user->update([
            'first_name' => $this->data['wife_first_name'],
            'last_name' => $this->data['wife_last_name'],
        ]);
        $marriage->wife->update([
            'status_id' => $this->data['wife_status']
        ]);

        if(!is_null($this->data['marriage_date'])){
            $marriage->update(['date'=>$this->data['marriage_date']]);
        }
        
        $marriage->wife->profile->leave->update(['address_id'=>$address_id]);
        $marriage->husband->profile->leave->update(['address_id'=>$address_id]);
        session()->flash('message','The Marriage iformation was updated successfully');
        return back();
    }

}
