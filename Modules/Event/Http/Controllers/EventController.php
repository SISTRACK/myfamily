<?php

namespace Modules\Event\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Events\RegisterFamilyEvent;
use Modules\Events\FamilyEventFormRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('event::new_event');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('event::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(FamilyEventFormRequest $request)
    {

        if($event =new RegisterFamilyEvent($request->all()) && session('error') == null){
            //broadcast(new RegisterNewFamilyEvent($event))->toOthers();
        }
        return redirect('/event');
      
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('event::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('event::edit');
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
