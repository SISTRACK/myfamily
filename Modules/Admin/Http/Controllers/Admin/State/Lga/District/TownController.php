<?php

namespace Modules\Admin\Http\Controllers\Admin\State\Lga\District;

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
    public function index($state,$lga,$district,$districtId)
    {
        return view('admin::District.Town.index',['district'=>District::find($districtId)]);
    }

    public function update(Request $request,$state,$lga,$district,$districtId,$townId)
    {
        $request->validate([
            'district'=>'required',
            'name'=>'required',
            'code'=>'required',
        ]);
        $town = Town::find($townId);
        $town->district_id = $request->district;
        $town->name = $request->name;
        $town->code = $request->code;
        $town->save();
        session()->flash('message','Town updated successfully');
        return back();
    }

    public function delete($state,$lga,$district,$districtId,$townId)
    {
        
        $town = Town::find($townId);
        if(count($town->areas) == 0){
            $town->delete();
            session()->flash('message','Town updated successfully');
        }else{
            session()->flash('message',['Sorry we cant delete this town because there are some areas in it please delete all its area']);
        }
        
        return back();
    }

}
