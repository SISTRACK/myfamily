<?php

namespace Modules\Search\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\BaseController;
use Modules\Search\Services\Traits\SearchUser;

class SearchController extends BaseController
{
    use SearchUser;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('search::index');
    }

    public function identity()
    {
        return view('search::identity');
    }

    public function relative()
    {
        return view('search::index');
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('search::create');
    }
 
    public function getGenerations($id)
    {
        dd($id);
    }
    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->session()->forget('status');
        $request->session()->forget('user');
        if(isset($request->generation)){
            $gen = new ValidGeneration(session('user_id'),$request->gen_no);
            $generation = $gen->generation;
            session()->flash('gen_result',$generation);
            return redirect()->route('identity');
        }elseif(isset($request->search_identity)){
            $users_found = $this->searchUsers($request->fname,$request->lname);
            session()->flash('users_result',$users_found);
            session()->flash('message', count($users_found)." Alternative Users matches result for $request->fname $request->lname");
            return redirect()->route('search.identity.index');
        }else{
            if(isset($request->search)){
                $request->session()->put(['status'=>session('other_status')]);
                $request->session()->put(['third_party'=>session('other_status')]);
                $request->session()->put(['user'=>$request->user]);
            }else{
                if($request->status == 'Self')
                {
                    $request->session()->put(['status'=>$request->file]);

                }else{
                    $request->session()->put(['other_status'=>$request->file]);
                }
                $request->session()->put(['search'=>$request->status]);
            }
            return redirect()->route('search.index');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('search::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('search::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
