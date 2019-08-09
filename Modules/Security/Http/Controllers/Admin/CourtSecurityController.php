<?php

namespace Modules\Security\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Security\Entities\Security;
use Modules\Profile\Entities\Gender;
use Modules\Profile\Entities\Profile;
use Modules\Address\Entities\State;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CourtSecurityController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('security::Admin..Court.Security.index',[
            'states'=>State::all(),
            'genders'=>Gender::all(),
            'courts'=>$this->availableCourts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('security::Admin.Court.Security.create',[
            'states'=>State::all(),
            'genders'=>Gender::all(),
            'courts'=>$this->availableCourts()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $data = $request->all();
        $errors = [];
        if($data['profile_id']){
            $profile = Profile::find($data['profile_id']);
            if(!$profile){
               $errors[] = 'Invalid Profile ID';
            }else{
                if($data['first_name'] !=$profile->user->first_name){
                   $errors[] = 'Sorry the specify first name does not match the one on the specified profile';
                }
                if($data['last_name'] !=$profile->user->last_name){
                   $errors[] = 'Sorry the specify last name does not match the one on the specified profile';
                }
                if($data['gender_id'] !=$profile->user->gender_id){
                   $errors[] = 'Sorry the specify Gender does not match the one on the specified profile';
                }
                if(empty($errors)){
                    $data['first_name'] = $profile->user->first_name;
                    $data['last_name'] = $profile->user->first_name;
                    $data['gender_id'] = $profile->gender_id;
                }else{
                    session()->flash('error',$errors);
                }
            }
           
        }else{
            
            if($this->getThisAdminState()->id == $data['state_id']){
                $errors[] = 'The profile ID is required for this registration';
            }
            $data['profile_id'] = null;
        }
        if(!session('error')){
            Security::create([
                'first_name'=>$data['first_name'],
                'last_name'=>$data['last_name'],
                'email'=>$data['email'],
                'password'=>Hash::make($data['password']),
                'phone'=>$data['phone'],
                'gender_id'=>$data['gender_id'],
                'profile_id'=>$data['profile_id'],
                'court_id'=>$data['court_id'],
                'state_id'=>$data['state_id'],
            ]);
            session()->flash('message','The court user agent created successfully');
            return redirect()->route('admin.security.court.user.index');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $security_id)
    {
        $data = $request->all();
        $security = Security::find($security_id);
        $security->update([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'gender_id'=>$data['gender_id'],
            'profile_id'=>$data['profile_id'],
            'court_id'=>$data['court_id'],
            'state_id'=>$data['state_id'],
        ]);
        if($data['password']){
            $security->update([
                 'password'=>Hash::make($data['password'])
            ]);
        }

        session()->flash('message','The Court User Agent Information updated successfully');
        return redirect()->route('admin.security.court.user.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($security_id)
    {
        $security = Security::find($security_id);
        $security->delete();
        session()->flash('message','The Court User Agent Account deleted successfully');
        return redirect()->route('admin.security.court.user.index');
    }
}
