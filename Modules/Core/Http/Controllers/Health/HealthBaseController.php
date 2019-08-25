<?php

namespace Modules\Core\Http\Controllers\Health;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class HealthBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:health']);
    }
}
