<?php

namespace Modules\Event\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Events\RegisterFamilyEvent;
use Modules\Event\Http\Requests\FamilyEventFormRequest;
use Modules\Event\Services\Registration\RegisterFamilyEvent as NewFamilyEvent;
use Modules\Family\Services\Family\RootFamily;
use Modules\Event\Entities\FamilyEvent;
use Modules\Event\Entities\AttendEvent;
use Modules\Core\Http\Controllers\BaseController;

class EventController extends BaseController
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

        if($event =new NewFamilyEvent($request->all()) && session('error') == null){
            //broadcast(new RegisterNewFamilyEvent($event))->toOthers();
        }
        return redirect('/event');
      
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function updateStatus($id,$status)
    {
        $event = AttendEvent::where(['family_event_id'=>$id,'profile_id'=>Auth()->User()->profile->id]);
        if($event->update(['status'=>$status]))
            return true;
        else
            return false;
        
    }
    public function attendingEvent($id)
    {
        $flag = false;
        foreach (Auth()->User()->profile->attendEvents()->get() as $event) {
            if($event != null && $event->status == 1 && FamilyEvent::find($id)->id == $event->family_event_id){
                $flag = true;
            }
        }
        return $flag;
        
    }

    public function mightAttendEvent($id)
    {
        $flag = false;
        foreach (Auth()->User()->profile->attendEvents()->get() as $event) {
            if($event != null && $event->status == 2 && FamilyEvent::find($id)->id == $event->family_event_id){
                $flag = true;
            }
        }
        return $flag;
    } 

    public function attend($id)
    {
        $profile = Auth()->User()->profile;

        if($this->attendingEvent($id)){
            session()->flash('error',['Sorry you are already in the list of people that attend this event']);      
        }else{
            if($this->mightAttendEvent($id)){
                $this->updateStatus($id,1);
                session()->flash('message','Congratulation you are remove from people that might attend and added to the list of people  attend this event');
            }else{
                $profile->attendEvents()->create([
                'family_event_id'=>$id,
                'status'=>1
                ]);
                session()->flash('message','Congratulation you are added to the list of people  attend this event');
            }
            
        }
        return redirect()->route('event.index');
    }
    public function mightAttend($id)
    {
        $profile = Auth()->User()->profile;
        if($this->mightAttendEvent($id)){
            session()->flash('error',['Sorry you are already in the list of people that might attend this event']);
        }else{
            
            if($this->attendingEvent($id)){
                $this->updateStatus($id,2);
                session()->flash('message','Congratulation you are remove from people attending and added to the list of people  that might attend this event');
            }else{
                $profile->attendEvents()->create([
                'family_event_id'=>$id,
                'status'=>2
                ]);
                session()->flash('message','Congratulation you are added to the list of people  taht might attend this event');
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
