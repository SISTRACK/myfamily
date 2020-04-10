<?php

namespace Modules\Admin\Http\Controllers\Admin\State\Lga\District;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\Area;
use Modules\Address\Entities\Town;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($state,$lga,$district,$districtId,$townId)
    {
        return view('admin::District.Town.Area.index',['town'=>Town::find($townId)]);
    }

    public function register(Request $request)
    {
        $town = Town::find($request->town_id);
        $counter = count($town->areas) + 1;
        foreach($request->areas as $area){
            $town->areas()->create(['name'=>$area,'code'=>$this->formatCode($counter)]);
            $counter++;
        }
        session()->flash('message','All the areas has been registerde successfully');
        return back();
    }
    
    public function formatCode($code)
    {
        if($code < 10){
            $code = '0'.$code;
        }
        return $code;
    }

    public function update(Request $request,$state,$lga,$district,$districtId,$town,$areaId)
    {
        $area = Area::find($areaId);
        
        $area->update($request->all());
        session()->flash('message','Area information updated successfully');
        return back();
    }

    public function delete($state,$lga,$district,$districtId,$town,$areaId)
    {
        $area = Area::find($areaId);
        if(count($area->locations) == 0){
            $area->delete();
            session()->flash('message','Area deleted successfully');
        }else{
            session()->flash('error',['Sorry we cant delete this area, because it contain some families, to delete this area you have to delete all the families in it']);
        }

        return back();
    }

}
