<?php

namespace Modules\Admin\Http\Controllers\Admin\State\Lga\District;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\District;

class DivorceController extends Controller
{
    /**s
     * Display a listing of the resource.
     * @return Response
     */
    public function index($state,$lga,$district,$districtId)
    {
        return view('admin::District.Divorce.index',['district'=>District::find($districtId)]);
    }

    
}
