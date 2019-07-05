<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth:family','dead']);
        
    }

    public function profile()
    {
    	return auth()->guard('family')->User()->profile;
    }
    
}
