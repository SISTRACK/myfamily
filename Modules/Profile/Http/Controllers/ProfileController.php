<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Services\Update\UpdateProfile;
use Modules\Profile\Entities\Image;
use Modules\Core\Http\Controllers\BaseController;
use App\User;
use Modules\Profile\Entities\ProfileAccess;

class ProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if(session('gues')){
            $user = User::find(session('gues'));
        }else{
            $user = Auth()->User();
        }
        return view('profile::index',['user'=>$user]);
    }

    public function accessProfile($id)
    {
        session(['gues'=>$id]);

        return redirect('profile');
    }

    public function resumeProfile($id)
    {
        session()->forget('gues');

        return redirect('profile');
    }

    public function blockProfileAccess($id)
    {
        $access = null;
        foreach (ProfileAccess::where(['profile_id'=>$id, 'access_to_id'=>Auth()->User()->profile->id])->get() as $user_access) {
            $access = $user_access;
        }
        $access->is_active = 0;
        $access->save();
        session()->flash('message','User wass successfully blocked from viewing your profile');
        return redirect('/profile');
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
   

    /**
     * Show the specified resource.
     * @return Response
     */
    public function setting()
    {
        return view('profile::Forms.profile_setting',['user'=>Auth()->User()]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function userDetail()
    {
        return view('profile::Forms.user_detail');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {

        if($request->submit == 'upload_image'){
            $error = [];
            if(isset($request->id)){
                $user = User::find($request->id);
            }else{
                $user = Auth()->User();
            }
            // if(!$request->hasFile('file')){
            //     $error[] = 'No file selected';
            // }
            // if(!$request->file('file')->isValid()){
            //     $error[] = 'Invalid file selected';
            // }    
            if(empty($error)){
                $file = $request->file('file');
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/users',$name);
                $image = Image::create(['name'=>$name]);
                $user->profile()->update(['image_id'=>$image->id]);
                session()->flash('message','Profile image uploaded Successfully');
            }else{
                session()->flash('error',$error);
            }           
        }else{
            new UpdateProfile($request->all());
        }
       
        return redirect()->route('profile.index');
    }

    
}
