<?php

namespace Modules\Birth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Family\Services\Birth\birthCore;
use Modules\Birth\Services\Register\RegisterBirth  as NewBirth;
use Modules\Core\Http\Controllers\BaseController;

class BirthController extends BaseController
{
   
    use NewBirth;

}
