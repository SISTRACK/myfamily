<?php

namespace Modules\Family\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Routing\Controller;

use Modules\Family\Services\Account\RegisterFamily;

use Modules\Family\Services\Account\NewFamily;

use Modules\Core\Http\Controllers\BaseController;

use Modules\Family\Events\NewFamilyEvent;

class FamilyController extends BaseController
{
    use RegisterFamily;
}
