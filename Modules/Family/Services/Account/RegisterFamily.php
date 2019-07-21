<?php

namespace Modules\Family\Services\Account;

use Modules\Family\Http\Requests\FamilyFormRequest;
use Modules\Family\Services\Account\NewFamily;
use Modules\Family\Events\NewFamilyEvent;
use Modules\Family\Entities\Tribe;

trait RegisterFamily
{
    public function index()
    {
        $user = auth()->guard('family')->user();
        $page = $user->first_name.'-'.$user->last_name;
        if($user->profile){
            $page = $user->profile->thisProfileFamily()->name;
        }
        return redirect()->route('home',strtolower($page));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('family::Family.create',['tribes'=>Tribe::all()]);
    }
    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(FamilyFormRequest $request)
    {
        // try {
            if($family = new NewFamily($request->all())){
                if(session('error') == null){
                    //broadcast(new NewFamilyEvent($family->family))->toOthers();
                    session()->flash('message','Family account crated successfully');
                }
                return redirect()->route('family.create',[strtolower(auth()->user()->first_name.'-'.auth()->user()->last_name)]);
            }
        // } catch (\Exception $exception) {
        //     return back()->withInput()
        //         ->withErrors(['error' => 'Unexpected error occurred while trying to process your request!']);
        // }
    }
}

