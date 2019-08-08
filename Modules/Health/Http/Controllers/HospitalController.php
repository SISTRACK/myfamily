<?php

namespace Modules\Health\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\State;
use Modules\Profile\Entities\Gender;
use Modules\Health\Entities\Hospital;
use Modules\Health\Entities\Discpline;
use Modules\Health\Entities\HospitalType;
use Modules\Health\Entities\HospitalCategory;
use Modules\Health\Http\Requests\HospitalFormRequest;
use Modules\Health\Services\Traits\HospitalAndDoctors as Hospitalized;

class HospitalController extends Controller
{
    use Hospitalized;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('health::Hospital.index',[
            'hospitals'=>$this->availableHospitals(),
            'towns'=>$this->availableDistricts(),
            'hospital_types'=>HospitalType::all(),
            'hospital_categories'=>HospitalCategory::all(),
            'genders'=>Gender::all(),
            'discplines'=>Discpline::all(),
            'states'=>State::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('health::Hospital.create',['districts'=>$this->availableDistricts(),'hospital_types'=>HospitalType::all(),'hospital_categories'=>HospitalCategory::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */

    public function register(HospitalFormRequest $request)
    {
        $this->registerThisHospital($request->all());
        return redirect()->route('admin.health.hospital.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('health::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(HospitalFormRequest $request, $hospital_id)
    {
        $this->updateThisHospital(Hospital::find($hospital_id), $request->all());
        return redirect()->route('admin.health.hospital.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function deleteHospital($hospital_id)
    {
        $hospital = Hospital::find($hospital_id);
        $hospital->hospitalLocation()->delete();
        foreach($hospital->doctors as $doctor){
            $doctor->delete();
        }
        $hospital->delete();
        session()->flash('message','Congratulation We successfully deleted hospital and all its doctors records');
        return redirect()->route('admin.health.hospital.index');
    }
    
}
