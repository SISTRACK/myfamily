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
        return redirect()->route('home');
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
                return redirect()->route('family.create');
            }
        // } catch (\Exception $exception) {
        //     return back()->withInput()
        //         ->withErrors(['error' => 'Unexpected error occurred while trying to process your request!']);
        // }
    }
}

