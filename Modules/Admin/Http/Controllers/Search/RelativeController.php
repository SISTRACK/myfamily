<?php

namespace Modules\Admin\Http\Controllers\Search;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\Traits\Searchable;

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
        dd($request->all());
    }

}
