<?php

namespace Modules\Admin\Http\Controllers\Configuration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\Traits\NewBirth;
use Modules\Admin\Services\Traits\Margeable;
use App\User;

class FamilyController extends Controller
{
    public $errors = [];

    public $data;

    use Margeable, NewBirth;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function margeIndex()
    {
        session()->forget(['father_profile','child_profile']);
        return view('admin::Configuration.Family.Marge.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function verifyMotherBaseOnFamily()
    {
        return view('admin::Configuration.Family.Marge.verify',['profile' => session('father_profile') ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function newBirth()
    {
        return view('admin::Configuration.Family.Marge.birth');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function marge(Request $request)
    {
        $this->data = $request->all();
        $this->registerBirth();
        $this->margeThisFamilies();
        return redirect()->route('admin.config.father.child.family.marge');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
