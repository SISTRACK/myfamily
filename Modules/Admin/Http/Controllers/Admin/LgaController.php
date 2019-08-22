<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LgaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $request->validate(['lga'=>'required|string']);
        $errors = [];
        foreach(admin()->state->lgas as $lga){
            if($lga->name == $request->lga){
                $errors[] = 'This local government already exist';
            }
        }
        if(empty($errors)){

            $lga = admin()->state->lgas()->create(['name'=>$request->lga]);

            session()->flash('message','Congratulation you ware successfully created the local government please click the new district button to add district to '.$request->lga.' Local government');

            return redirect()->route('lga.dashboard',[
                    strtolower(str_replace(' ','-',$lga->state->name)),
                    strtolower(str_replace(' ','-',$lga->name)),
                    $lga->id]);
        }else{
            session()->flash('error',$errors);
        }
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
