<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Forum\Entities\Message;
use Modules\Core\Http\Controllers\BaseController;
class ForumController extends BaseController
{
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function nuclear()
    {

        return view('forum::nuclear',['family'=>$this->profile()->family]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function extended()
    {

        return view('forum::extended',['family'=>$this->profile()->family->root()]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function sendNuclearMessage(Request $request)
    {
        
        $message = Message::firstOrCreate(['message'=>$request->message]);
        $message_sender = $message->userMessages()->create(['profile_id'=>$this->profile()->id]);
        $message_sender->nuclearFamilyMessage()->create(['family_id'=>$this->profile()->family_id]);
        session()->flash('message was sent successfully');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function sendExtendedMessage(Request $request)
    { 
        $message = Message::firstOrCreate(['message'=>$request->message]);
        $message_sender = $message->userMessages()->create(['profile_id'=>$this->profile()->id]);
        $message_sender->extendFamilyMessage()->create(['family_id'=>$this->profile()->family->root()->id]);
        session()->flash('message was sent successfully');
        return back();
    }

    
}
