<?php

namespace Modules\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\Traits\Administration;

class AdminBaseController extends Controller
{
    use Administration;

    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }
}
