<?php

namespace Modules\Health\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Core\Services\Traits\UploadFile;
use Modules\Core\Http\Controllers\BaseController;

class HealthController extends Controller
{
    use UploadFile;

    public function __construct()
    {
        $this->middleware('auth:health');
    }

    public function verify()
    {
        return redirect()->route('health.dashboard');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('health::Doctor.dashboard');
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
