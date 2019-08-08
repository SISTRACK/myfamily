<?php

namespace Modules\Security\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Address\Entities\State;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CourtController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('security::Admin.Court.index',['courts'=>$this->availableCourts(),'districts'=>$this->availableDistricts(),'court_categories'=>[],'court_types'=>[],'states'=>State::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('security::Admin.Court.create',['courts'=>$this->availableCourts(),'districts'=>$this->availableDistricts(),'court_categories'=>[],'court_types'=>[],'states'=>State::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $town = Town::find($data['town_id']);
        $court = $town->courtLocations()->firstOrCreate([
            'name' => $data['name'],
            'court_type_id' => $data['court_type_id'],
            'court_category_id' => $data['court_category_id'],
        ]);
        $court->courtLocation()->firstOrCreate([
            'address' => $data['address'],
            'town_id' => $data['town_id'],
        ]);
        session()->flash('message','Court created successfully');
    
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
    public function delete($id)
    {
        //
    }
}
