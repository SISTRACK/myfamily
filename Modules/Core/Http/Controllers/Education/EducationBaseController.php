<?php

namespace Modules\Core\Http\Controllers\Education;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EducationBaseController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:teacher']);
    }
}
