<?php

namespace Modules\Admin\Http\Controllers\Registration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\District;
use Modules\Family\Entities\Family;
use Modules\Marriage\Entities\Status;
use Modules\Marriage\Entities\Marriage;
use Modules\Address\Services\LivingAddress;
use Modules\Marriage\Events\NewMarriageEvent;
use Modules\Marriage\Http\Requests\MarriageFormRequest;
use Modules\Marriage\Register\Marriage\MarriageRegistered;

class MarriageController extends Controller
{
    use LivingAddress;
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public $data;

    public function createMarriage($state,$lga,$district,$id)
    {

        $district = District::find($id);
        
        return view('admin::Admin.Registration.Marriage.create',['district'=>$district,'families'=>$district->families()]);
    }

    public function verifyMarriageFamily(Request $request)
    {
        $request->validate([
            'family' => 'required',
            'status'=> 'required'
        ]);
        session(['register'=>$request->all()]);
        session(['family'=>Family::find($request->family)]);
        return back();
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
