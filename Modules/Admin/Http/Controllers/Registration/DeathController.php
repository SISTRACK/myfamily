<?php

namespace Modules\Admin\Http\Controllers\Registration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\District;
use Modules\Death\Entities\Death;
use Modules\Family\Services\Family\ValidDeathNames;
use Modules\Death\Http\Requests\DeathFormRequest;
use Modules\Death\Services\Registration\NewDeath as RegisterDeath;
use Modules\Death\Events\NewDeathEvent;

class DeathController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createDeath($state,$lga,$district,$id, ValidDeathNames $names)
    {
        $district = District::find($id);
        return view('admin::Admin.Registration.Death.create',['district'=>$district,'names'=>$names->names]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function registerDeath(DeathFormRequest $request)
    {
        if($death = new RegisterDeath($request->all()) && is_null(session('error'))){

            //broadcast(new NewDeathEvent($death))->toOthers();

            session()->forget('death');
            session()->flash('message','Death has been registered successfully');
            return back();
        }
        
        return back()->withInput();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function verifyFamily(Request $request,$state,$lga,$district,$id)
    {
        $request->validate([
            'family' => 'required',
            'status'=> 'required'
        ]);
        session(['death'=>$request->all()]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function editDeath($state,$lga,$dist,$family,$id)
    {
        return view('admin::Admin.Registration.Death.edit',['death'=>Death::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateDeath(DeathFormRequest $request, $state,$lga,$dist,$family,$id)
    {
        $death = Death::find($id);
        $death->update([
            'place'       => $request->place,
            'death_at'    => $request->death_at,
            'about_death' => $request->about_death
        ]);
        if(!is_null($request->date)){
            $death->update([
                'date'  => strtotime($request->date),
            ]);
        }
        session()->flash('message','Death information updated successfully');
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
