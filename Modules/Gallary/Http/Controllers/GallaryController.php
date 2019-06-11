<?php

namespace Modules\Gallary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\BaseController;

class GallaryController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function privateIndex()
    {
        return view('gallary::private.photo');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function nuclearIndex()
    {
        return view('gallary::nuclear.photo');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function extendedIndex()
    {
        return view('gallary::extended.photo');
    }

    
}
