<?php

namespace Modules\Security\Http\Controllers\Admin\Court;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Profile\Entities\Gender;
use Modules\Address\Entities\State;
use Modules\Security\Entities\Court;
use Modules\Security\Entities\CourtType;
use Modules\Security\Entities\CourtCategory;
use Modules\Security\Http\Requests\Admin\CourtFormRequest;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CourtController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        return view('security::Admin.Court.index',[
            'courts'=>$this->availableCourts(),
            'districts'=>$this->availableDistricts(),
            'court_categories'=>CourtCategory::all(),
            'court_types'=>CourtType::all(),
            'states'=>State::all(),
            'genders'=>Gender::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('security::Admin.Court.create',['courts'=>$this->availableCourts(),'districts'=>$this->availableDistricts(),'court_categories'=>CourtCategory::all(),'court_types'=>CourtType::all(),'states'=>State::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(CourtFormRequest $request)
    {
        $data = $request->all();
        $court_type = CourtType::find($data['court_type_id']);
        $court = $court_type->courts()->firstOrCreate([
            'name' => $data['name'],
            'court_type_id' => $data['court_type_id'],
            'court_category_id' => $data['court_category_id'],
        ]);
        $court->courtLocation()->firstOrCreate([
            'address' => $data['address'],
            'town_id' => $data['town_id'],
        ]);
        session()->flash('message','Court created successfully');
        return redirect()->route('admin.security.court.index');
    
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CourtFormRequest $request, $court_id)
    {
        $data = $request->all();
        $court = Court::find($court_id);
        $court->update([
            'name' => $data['name'],
            'court_type_id' => $data['court_type_id'],
            'court_category_id' => $data['court_category_id'],
        ]);
        $court->courtLocation()->update([
            'address' => $data['address'],
            'town_id' => $data['town_id'],
        ]);
        session()->flash('message', 'Court information updated successfully');
        return redirect()->route('admin.security.court.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($court_id)
    {
        $court = Court::find($court_id);
        $court->courtLocation->delete();
        $court->delete();
        session()->flash('message', 'Court is deleted successfully');
        return redirect()->route('admin.security.court.index');
    }
}
