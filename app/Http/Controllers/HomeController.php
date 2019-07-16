<?php

namespace App\Http\Controllers;
use Modules\Gallary\Entities\AlbumType;
use Modules\Gallary\Entities\AlbumContentType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->User();
        $profile = null;
        if($user->profile != null && $user->profile->child != null && $user->profile->husband == null && $user->profile->wife == null){
            $profile = $user->profile->child->birth->father->husband->profile;
        }else{
            $profile = $user->profile;
        }
        session()->put(['album_contents'=>AlbumContentType::all(),'album_types'=>AlbumType::all()]);
        return view('home',['profile'=>$profile,]);
    }
    public function verifyUser()
    {
        $member = auth()->guard('family')->user();
        $page = $member->first_name.' '.$member->last_name;
        if($member->profile){
            $page = $member->profile->family->name;
        }
        return redirect()->route('home',[$page]);
    }
}
