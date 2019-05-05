<?php

namespace Modules\Divorce\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Divorce\Events\NewDivorceEvent;
use Modules\Divorce\Http\Requests\DivorceFormRequest;
use Modules\Divorce\Http\Requests\ReturnDivorceFormRequest;
use Modules\Divorce\Services\Registration\ProcessWives;
use Modules\Divorce\Services\Registration\ReturnDivorce\PrecessDivorcedWives;
use Modules\Divorce\Services\Registration\DivorceWife;
use Modules\Divorce\Services\Registration\ReturnDivorce\ReturnWife;
use Modules\Core\Http\Controllers\BaseController;

class DivorceController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ProcessWives $wives)
    {
        return view('divorce::index',['husband'=>Auth()->User()->profile->husband]);
    }


    public function return(PrecessDivorcedWives $wives)
    {
        return view('divorce::return_wife',['wives'=>$wives->validWives]);
    }

    public function divorce(ProcessWives $wives)
    {
        return view('divorce::divorce_wife',['wives'=>$wives->validWives]);
    }
    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function returnStore(ReturnDivorceFormRequest $request)
    {
        $return = new ReturnWife($request->all());
        if(empty($return->error)){
            //broadcast(new NewReturnDivorceEvent($return));
        }
        return redirect('/return_wife');
    }
    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function divorceStore(DivorceFormRequest $request)
    {
        $divorce = new DivorceWife($request->all());
        if(empty($divorce->error)){
            //broadcast(new NewDivorceEvent($divorce));
        }
        return redirect('/divorce_wife');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('divorce::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('divorce::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
