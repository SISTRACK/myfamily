<?php

namespace Modules\Admin\Http\Controllers\Search;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\Traits\Searchable;
use Modules\Profile\Entities\Profile;

class IdentityController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::Search.Identity.index');
    }
    
    public function searchProfiles(Request $request)
    {
        
        $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string'
        ]);

        session(['available_profiles'=>$this->getAvailableProfiles($request->all())]);

        return redirect()->route('admin.search.identity.available.profiles',strtolower($request->first_name.'-'.$request->last_name)); 
    }

    public function availableSearchProfile()
    {
        $profiles= null;
        if(session('available_profiles')){
            $profiles = session('available_profiles');
        }
        return view('admin::Search.Identity.available_profiles',['profiles'=>$profiles]);
    }

    public function generationIndex(Request $request)
    {
        return view('admin::Search.Identity.generation',['profile'=>Profile::find($request->profile_id)]);
    }

    public function generationSearch(Request $request)
    {
       
        $results = Profile::find($request->profile_id)->user->getSearchGenerationResult($request->generation);
            return view('admin::Search.Identity.results',['results',$results]);  
        
    }
}
