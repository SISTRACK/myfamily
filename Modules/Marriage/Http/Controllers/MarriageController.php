<?php

namespace Modules\Marriage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Marriage\Register\Marriage\RegisterMarriage;
use Modules\Core\Http\Controllers\BaseController;

class MarriageController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public $family;
    
    use RegisterMarriage;

}
