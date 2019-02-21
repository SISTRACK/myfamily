<?php

namespace Modules\Event\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Events\RegisterFamilyEvent;
use Modules\Event\Http\Requests\FamilyEventFormRequest;
use Modules\Event\Services\Registration\RegisterFamilyEvent as FamilyEvent;
use Modules\Family\Services\Family\RootFamily;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $root = new RootFamily(Auth()->User()->profile->family);
        return view('event::index',['family'=> $root->family]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('event::new_event');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(FamilyEventFormRequest $request)
    {

        if($event =new FamilyEvent($request->all()) && session('error') == null){
            //broadcast(new RegisterNewFamilyEvent($event))->toOthers();
        }
        return redirect('/event');
      
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function attend($id)
    {
        $profile = Auth()->User()->profile;
        if($profile->attendEvent->where(['event_id'=>$id,'status'=>1])->get()->isNotEmpty()){
            session()->flash('error',['Sorry you are already in the list of people that attend this event']);        
        }else{
            $event = $profile->attendEvent->where(['event_id'=>$id,'status'=>2])->get();
            if($event->isNotEmpty()){
                $event->update(['status'=>1]);
                session()->flash('message','Congratulation you are remove from people that might attend and added to the list of people  attend this event');
            }else{
                $profile->attendEvents->create([
                'event_id'=>$id,
                'status'=>1
                ]);
                session()->flash('message','Congratulation you are added to the list of people  attend this event');
            }
            
        }
        return redirect()->route('event.index');
    }
    public function maightAttend($id)
    {
        $profile = Auth()->User()->profile;
        if($profile->attendEvent->where(['event_id'=>$id,'status'=>2])->get()->isNotEmpty()){
            session()->flash('error',['Sorry you are already in the list of people that might attend this event']);
        }else{
            $event = $profile->attendEvent->where(['event_id'=>$id,'status'=>1])->get();
            if($event->isNotEmpty()){
                $event->update(['status'=>2]);
                session()->flash('message','Congratulation you are remove from people attending and added to the list of people  that might attend this event');
            }else{
                $profile->attendEvents->create([
                'event_id'=>$id,
                'status'=>2
                ]);
                session()->flash('message','Congratulation you are added to the list of people  attend this event');
            }
        }
        return redirect()->route('event.index');
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
