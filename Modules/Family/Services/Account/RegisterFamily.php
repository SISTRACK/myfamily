<?php

namespace Modules\Family\Services\Account;

use Modules\Family\Http\Requests\FamilyFormRequest;
use Modules\Family\Services\Account\NewFamily;
use Modules\Family\Events\NewFamilyEvent;
use Modules\Address\Entities\Country;
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
        return view('family::Family.create',['tribes'=>Tribe::all(),'country'=>Country::find(1)]);
    }
    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(FamilyFormRequest $request)
    {
        try {
            DB::beginTransaction();
            if($family = new NewFamily($request->all())){
                if(session('error') == null){
                    return redirect()->route('family.create',
                    [strtolower(auth()->user()->first_name.'-'.auth()->user()->last_name)])->withSuccess('Family account crated successfully');
                    //broadcast(new NewFamilyEvent($family->family))->toOthers();
                }
                return redirect()->route('family.create',
                [strtolower(auth()->user()->first_name.'-'.auth()->user()->last_name)])->withSuccess('Family account crated successfully');
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return back()->withInput()
                ->withErrors(['error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}

