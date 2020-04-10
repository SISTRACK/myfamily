<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\Lga;
use Modules\Address\Entities\Area;
use Modules\Address\Entities\District;
use Modules\Address\Entities\Town;

class CoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getAreas($town_id)
    {
        return response()->json(Area::where('town_id',$town_id)->pluck('name','id'));
    }
    
    public function getLgas($state_id)
    {
        return response()->json(Lga::where('state_id',$state_id)->pluck('name','id'));
    }

    public function getDistricts($lga_id)
    {
        return response()->json(District::where('lga_id',$lga_id)->pluck('name','id'));
    }

    public function getTowns($district_id)
    {
        return response()->json(Town::where('district_id',$district_id)->pluck('name','id'));
    }
}
