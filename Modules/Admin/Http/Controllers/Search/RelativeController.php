<?php

namespace Modules\Admin\Http\Controllers\Search;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Search\Services\Traits\NewSearch;
use Modules\Admin\Services\Traits\Searchable;
use Modules\Profile\Entities\Profile;

class RelativeController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::Search.Relative.index');
    }

    public function searchProfiles(Request $request)
    {
        
        $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string'
        ]);

        session(['available_profiles'=>$this->getAvailableProfiles($request->all())]);

        return redirect()->route('admin.search.relative.available.profiles',strtolower($request->first_name.'-'.$request->last_name)); 
    }

    public function search(Request $request)
    {
        $request->validate([
            'type'=>'required|string'
        ]);
        $profile = Profile::find($request->profile_id);
        $search = new NewSearch(Profile::find($request->profile_id),$request->type);
        session(['profile'=>$profile,'results'=>$search->results]);

        return redirect()->route('admin.search.relative.result',[strtolower($profile->user->first_name.'-'.$profile->user->last_name),strtolower($request->type)]); 
    }

    public function result()
    {
        return view('admin::Search.Relative.result',['results'=>session('results')]);
    }

    public function availableSearchProfile()
    {
        $profiles= null;
        if(session('available_profiles')){
            $profiles = session('available_profiles');
        }
        return view('admin::Search.Relative.available_profiles',['profiles'=>$profiles]);
    }

}
