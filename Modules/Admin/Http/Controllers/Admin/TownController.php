<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\Town;
use Modules\Address\Entities\District;

class TownController extends Controller
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
        
        $district = District::find($request->district_id);
        $counter = count($district->towns) + 1;
        foreach ($request->towns as $town) {
            Town::firstOrCreate([
                'lga_id'=>$district->lga->id,
                'district_id'=>$district->id,
                'name'=>$town,
                'code'=>$this->formatCode($counter)
                ]);
            $counter++;    
        }
        
        session()->flash('message','Congratulation you ware successfully created the town please click the new town button to add town or village to reagister another one if any');
        return back();
        
    }
    
    public function formatCode($code)
    {
        if($code < 10){
            $code = '0'.$code;
        }
        return $code;
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
