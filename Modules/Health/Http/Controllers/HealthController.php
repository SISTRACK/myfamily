<?php

namespace Modules\Health\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Profile\Entities\Profile;
use Modules\Core\Services\Traits\UploadFile;
use Modules\Core\Http\Controllers\BaseController;
class HealthController extends BaseController
{
    use UploadFile;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('health::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function view(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|integer'
        ]);
        $profile = Profile::find($request->profile_id);
        if(is_null($profile)){
            session()->flash('error',['Invalid Profile ID']);
            return back()->withInput();
        }
        return view('health::Patient.view',['profile'=>$profile]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function appendFile(Request $request)
    {
        $request->validate([
            'file'=>'required|image|mimes:jpeg,png,jpg'
        ]);
        $profile = Profile::find($request->id);
        $file = $this->storeFile($request->file,'Nfamily/Profile/Report/Medical/'.$profile->id);
        $profile->medicalReports()->create(['file'=>$file]);
           session()->flash('message','File was successfully added to the patient profile');
           return  redirect('/health');
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
    public function destroy($id)
    {
        //
    }
}
