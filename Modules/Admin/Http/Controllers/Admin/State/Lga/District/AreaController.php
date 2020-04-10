<?php

namespace Modules\Admin\Http\Controllers\Admin\State\Lga\District;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\District;

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

}
