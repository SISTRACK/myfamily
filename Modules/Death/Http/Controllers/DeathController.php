<?php

namespace Modules\Death\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Death\Http\Requests\DeathFormRequest;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Family\Services\Family\ValidFamilies;
use Modules\Family\Services\Family\ValidDeathNames;
use Modules\Death\Services\Registration\NewDeath as RegisterDeath;
use Modules\Death\Events\NewDeathEvent;
use Modules\Core\Http\Controllers\BaseController;

class DeathController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(ValidFamilies $family, ValidDeathNames $names)
    {
        return view('death::index',['families' => $family->families, 'names' => $names->names]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function verify(Request $request)
    {
        $request->validate([
            'family' => 'required',
            'status'=> 'required'
        ]);
        session(['death'=>$request->all()]);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(DeathFormRequest $request)
    {
        if($death = new RegisterDeath($request->all())){
            //broadcast(new NewDeathEvent($death))->toOthers();
        }
        session()->forget('death');
        return back();
    }


    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        //
    }
}
