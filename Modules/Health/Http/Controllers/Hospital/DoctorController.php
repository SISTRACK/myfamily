<?php

namespace Modules\Health\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Health\Entities\Doctor;
use Modules\Health\Http\Requests\DoctorFormRequest;
use Modules\Health\Services\Traits\HospitalAndDoctors;
use Modules\Core\Http\Controllers\Health\HealthBaseController;

class DoctorController extends HealthBaseController
{
    use HospitalAndDoctors;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('health::Hospital.Doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('health::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(DoctorFormRequest $request)
    {
        $data = $request->all();
        $this->createDoctorAccount($data);
        return redirect()->route('health.hospital.doctor.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('health::show');
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
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($doctor_id)
    {
        $doctor = Doctor::find($doctor_id);
        $doctor->delete();
        session()->flash('message','Doctor information is successfully deleted from '.doctor()->hospital->name.' Hospital');
        return back();
    }
}
