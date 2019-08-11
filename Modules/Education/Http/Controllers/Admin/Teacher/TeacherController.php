<?php

namespace Modules\Education\Http\Controllers\Admin\Teacher;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Education\Entities\Teacher;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TeacherController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('education::Admin.Teacher.index',['schools'=>$this->availableSchools()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('education::create');
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
            Teacher::create([
                'first_name'=>$data['first_name'],
                'last_name'=>$data['last_name'],
                'email'=>$data['email'],
                'password'=>Hash::make($data['password']),
                'phone'=>$data['phone'],
                'gender_id'=>$data['gender_id'],
                'profile_id'=>$data['profile_id'],
                'school_id'=>$data['school_id'],
                'state_id'=>$data['state_id'],
            ]);
            session()->flash('message','School user agent created successfully');
            return redirect()->route('admin.education.school.teacher.index');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('education::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('education::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
