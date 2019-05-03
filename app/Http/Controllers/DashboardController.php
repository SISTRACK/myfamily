<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Family\Entities\Family;
use Modules\Marriage\Entities\Marriage;
use Modules\Divorce\Entities\ReturnDetail;
use Modules\Birth\Entities\Birth;
use Modules\Divorce\Entities\Divorce;
use Modules\Death\Entities\Death;
use Modules\Profile\Entities\Profile;
use App\User;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    public function index()
    {
    	return view('Dashboard.index',
    		[
    			'marriages'=> Marriage::all(),
    			'families' => Family::all(),
    			'births' => Birth::all(),
    			'divorces' => Divorce::all(),
    			'deaths' => Death::all(),
    			'profiles' => Profile::all(),
    			'users' => User::all(),
    			'returns' => ReturnDetail::all(),
    	    ]);
    }
}
