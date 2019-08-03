<?php

namespace Modules\Health\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Health\Entities\Doctor;
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
        return view('health::Doctor.index',['hospitals'=>$this->availableHospitals()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('health::Doctor.create',['hospitals'=>$this->availableHospitals()]);
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
        return redirect()->route('admin.health.doctors.index');

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
    public function deleteDoctor($id)
    {
        //
    }


}
