<?php

namespace Modules\Admin\Http\Controllers\Registration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\District;
use Modules\Family\Entities\Tribe;
use Modules\Family\Http\Requests\FamilyFormRequest;
use Modules\Family\Services\Account\NewFamily;
use Modules\Family\Events\NewFamilyEvent;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::index');
    }

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
        if($family = new NewFamily($request->all())){
            if(session('error') == null){
                //broadcast(new NewFamilyEvent($family->family))->toOthers();
                session()->flash('message','Family account crated successfully');
            }
            return redirect('/admin');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
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
