<?php
namespace Modules\Marriage\Register\Marriage;

use Modules\Marriage\Register\Marriage\MarriageRegistered;

use Modules\Family\Entities\Family;

use Illuminate\Http\Request;

use Modules\Marriage\Events\NewMarriageEvent;

use Modules\Marriage\Http\Requests\MarriageFormRequest;

use Modules\Family\Services\Marriage\marriageCore;

trait RegisterMarriage
{
    public function index(marriageCore $marriage)
    {
        return view('marriage::Marriage.new_marriage',['family'=>$marriage->family,'families'=>$marriage->families,'husbands'=>$marriage->husbands,'wives'=>$marriage->wives,'status'=>$marriage->status,'tribes'=>$marriage->tribes]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    
    public function create()
    {
        
        return view('marriage::Marriage.new_marriage',['family'=>$families]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if(new MarriageRegistered($request->all()) && session('error') == null){
            //broadcast(new NewMarriageEvent($this->marriage))->toOthers();
            session()->forget('register');
        }
        return redirect()->route('marriage.index');
    }

    public function verify(Request $request)
    {
        session(['register'=>$request->all()]);
        return redirect('/marriage');
    }
}