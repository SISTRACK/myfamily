<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Family\Entities\Family;
use Modules\Marriage\Entities\Marriage;
use Modules\Birth\Entities\Birth;
use Modules\Death\Entities\Death;
use Modules\Divorce\Entities\Divorce;
use Modules\Divorce\Entities\ReturnDetail;
use Modules\Address\Entities\Lga;
use Modules\Address\Entities\State;
use Modules\Address\Entities\District;
use App\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function verify()
    {
        return redirect()->route('admin.dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lgaDashboard($state,$lga)
    {
        $lga = Lga::find($lga);
        return view('admin::Admin.lga_dashboard',['lga'=>$lga, 'districts'=>$lga->districts]);
    }

    public function stateDashboard($state,$state_id)
    {
        $state = State::find($state_id);
        return view('admin::Admin.state_dashboard',['state'=>$state]);
    }

    public function districtDashboard($state,$lga,$id)
    {
        return view('admin::Admin.district_dashboard',['district'=>District::find($id)]);
    }
    
    public function index()
    {
        $admin = auth()->guard('admin')->user();
        if($admin->state){
            $view = redirect()->route('state.dashboard',[str_replace(' ','-',strtolower($admin->state->name)),$admin->state->id]);
        }elseif ($admin->lga) {
            $view = redirect()->route('lga.dashboard',[strtolower(str_replace(' ','-',$admin->lga->state->name)),$admin->lga->id]);
        }elseif ($admin->district) {
            $view = redirect()->route('district.dashboard',[
                strtolower(str_replace(' ','-',$admin->district->lga->state->name)),
                strtolower(str_replace(' ','-',$admin->district->lga->name)),$district->id
                ]); 
        }else{
            $view = view('admin::Admin.dashboard',['districts' => State::all()]);
        }

        return $view; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::Admin.Auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
          'name'          => 'required',
          'email'         => 'required',
          'password'      => 'required'
        ]);
        // store in the database
        $admins = new Admin;
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password=bcrypt($request->password);
        $admins->save();
        return redirect()->route('admin.auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
