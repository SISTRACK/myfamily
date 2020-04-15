<?php
namespace Modules\Marriage\Register\Marriage;


use Modules\Family\Entities\Family;
use Modules\Address\Entities\Country;
use Illuminate\Http\Request;
use Modules\Marriage\Events\NewMarriageEvent;
use Modules\Marriage\Http\Requests\MarriageFormRequest;
use Modules\Marriage\Register\Marriage\MarriageRegistered;
use Modules\Family\Services\Marriage\marriageCore;

trait RegisterMarriage
{
    public function index(marriageCore $marriage)
    {
        return view('marriage::Marriage.new_marriage',['country'=>Country::find(1),'family'=>$marriage->family,'families'=>$marriage->families,'husbands'=>$marriage->husbands,'wives'=>$marriage->wives,'status'=>$marriage->status,'tribes'=>$marriage->tribes]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    
    public function create()
    {
        
        return view('marriage::Marriage.new_marriage',['country'=>Country::find(1),'family'=>$families]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(MarriageFormRequest $request)
    {
        if(new MarriageRegistered($request->all()) && session('error') == null){
            //broadcast(new NewMarriageEvent($this->marriage))->toOthers();
            session()->forget('register');
        }
        return back();
    }

    public function verify(Request $request)
    {
        $request->validate([
            'family' => 'required',
            'status'=> 'required'
        ]);
        $family = Family::find($request->family);
        return redirect()->route('family.marriage.create',[$family->id]);
    }
}