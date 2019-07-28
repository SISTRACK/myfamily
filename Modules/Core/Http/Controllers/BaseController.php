<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    
    public function __construct()
    {
    	$middleware = ['auth:admin'];
    	if(auth()->guard('admin')->user()){
    		$middleware = ['auth:admin'];
    	}elseif(auth()->guard('family')->user()){
    		$middleware = ['auth:family','dead'];
    	}
        $this->middleware($middleware);
    }

    public function profile()
    {
    	return auth()->guard('family')->User()->profile;
    }
    
}
