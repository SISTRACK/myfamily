<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Services\Update\UpdateProfile;
use Modules\Core\Http\Controllers\BaseController;

class ProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('profile::index',['user'=>Auth()->User()]);
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
        new UpdateProfile($request->all());

        return redirect()->route('profile.index');
    }

    
}
