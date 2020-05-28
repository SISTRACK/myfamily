<?php

namespace Modules\Birth\Services\Register;

use Modules\Family\Services\Birth\birthCore;
use Modules\Family\Entities\Family;
use Modules\Birth\Services\Register\Validation\ValidateBirthRequest as alidateRequest;
use Modules\Birth\Services\Register\NewBirth;
use Modules\Birth\Events\NewBirthEvent;
use Illuminate\Http\Request;
use Modules\Birth\Http\Requests\NewBirthFormRequest;

trait RegisterBirth
{
	use ValidateRequest;

	public function index($family,$familyId)
    {
        return view('birth::Birth.new_birth',['family'=>Family::find($familyId)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('birth::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(NewBirthFormRequest $request)
    {
        $birth = new NewBirth($request->all());
        if(session('error') == null){
        	//broadcast(new NewBirthEvent($birth->data))->toOthers();
            session()->flash('message','Birth is registered successfully');
            return back()->withSuccess('Brith is registered successfully');
        }
            return back()->withIput();
    }

    public function verify(Request $request)
    {
        $request->validate([
            'family' => 'required'
        ]);
        $family = Family::find($request->family);
        return redirect()->route('family.birth.create',[$family->name,$family->id]);
    }

}