<?php

namespace App\Http\Controllers;
use Modules\Gallary\Entities\AlbumType;
use Modules\Gallary\Entities\AlbumContentType;
use Modules\Core\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->User();
        $profile = null;
        if(auth()->guard('family')->check()){
            if($user->profile != null && $user->profile->child != null && $user->profile->husband == null && $user->profile->wife == null){
                $profile = $user->profile->child->birth->father->husband->profile;
            }else{
                $profile = $user->profile;
            }
            session()->put(['album_contents'=>AlbumContentType::all(),'album_types'=>AlbumType::all()]);
            return view('home',['profile'=>$profile,]);
        }
        return redirct()->route('admin.dashboard');
        
    }
    public function verifyUser()
    {
        
        if(auth()->guard('family')->check()){
            $member = auth()->guard('family')->user();
            $page = strtolower($member->first_name.'-'.$member->last_name);
            if($member->profile){
                $page = $member->profile->thisProfileFamily()->name;
            }
        }elseif(auth()->guard('admin')->check()){
            $page = 'administrator';;
        }
        return redirect()->route('home',[$page]);
    }
}
