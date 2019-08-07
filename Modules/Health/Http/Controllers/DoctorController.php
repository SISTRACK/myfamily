<?php

namespace Modules\Health\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Health\Entities\Doctor;
use Modules\Address\Entities\State;
use Modules\Profile\Entities\Gender;
use Modules\Health\Entities\Discpline;
use Modules\Health\Services\Traits\HospitalAndDoctors as Doctorized;

class DoctorController extends Controller
{
    use Doctorized;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('health::Doctor.index',
            [
                'hospitals'=>$this->availableHospitals(),
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
        return view('health::Doctor.create',['hospitals'=>$this->availableHospitals(),'genders'=>Gender::all(),'discplines'=>Discpline::all(),'states'=>State::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $data = $request->all();
        $this->validateDoctor($data)->validate();
        $this->createDoctorAccount($data);
        return redirect()->route('admin.health.doctor.index');

    }

   
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function deleteDoctor($id)
    {
        Doctor::find($id)->delete();
        session()->flash('mesaage','The doctor account was deleted successfully');
        return back();
    }


}
