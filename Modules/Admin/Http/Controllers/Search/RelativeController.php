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
        return view('admin::Search.Relative.available_profiles',['profiles'=>$this->getAvailableProfiles($request->all())]); 
    }

    public function search(Request $request)
    {
        $request->validate([
            'type'=>'required|string'
        ]);
        $search = new NewSearch(Profile::find($request->profile_id),$request->type);
        $results = $search->results;
        return view('admin::Search.Relative.result',['results'=>$results]); 
    }

}
