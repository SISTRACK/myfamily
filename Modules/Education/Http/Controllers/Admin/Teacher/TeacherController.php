<?php

namespace Modules\Education\Http\Controllers\Admin\Teacher;


use Illuminate\Http\Response;
use Modules\Address\Entities\State;
use Modules\Profile\Entities\Gender;
use Modules\Profile\Entities\Profile;
use Illuminate\Support\Facades\Hash;
use Modules\Education\Entities\School;
use Modules\Education\Entities\Teacher;
use Modules\Education\Entities\SchoolType;
use Modules\Education\Entities\SchoolCategory;
use Modules\Education\Http\Requests\Admin\TeacherFormRequest;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Education\Services\Traits\TeacherAndCategoriesRange as TeacherAble;

class TeacherController extends AdminBaseController
{
    use TeacherAble;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($school_id)
    {
        $school = School::find($school_id);
        switch ($school ? $school->schoolType->name : null) {
            case 'Nursery':
                $route = redirect()->route('admin.education.school.teacher.nursery.index');
                break;
            case 'Primary':
                $route = redirect()->route('admin.education.school.teacher.primary.index');
                break;
            case 'Secondary':
                $route = redirect()->route('admin.education.school.teacher.secondary.index');
                break;
            default:
                $route = view('education::Admin.Teacher.index',[
                    'schools'=>$this->availableSchools(),
                    'school_types'=>SchoolType::all(),
                    'school_categories'=>SchoolCategory::all(),
                    'districts'=>$this->availableDistricts(),
                    'states'=>State::all(),
                    'genders'=>Gender::all()
                    
                ]);
                break;
        }
        
        return $route;

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        return view('education::Admin.Teacher.create',[
            'schools'=>$this->availableSchools(),
            'school_types'=>SchoolType::all(),
            'school_categories'=>SchoolCategory::all(),
            'districts'=>$this->availableDistricts(),
            'states'=>State::all(),
            'genders'=>Gender::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */

    public function register(TeacherFormRequest $request)
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
            $teacher = Teacher::create([
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
            return redirect()->route('admin.education.school.teacher.index',[strtolower($teacher->school->id)]);
        }
    }

    
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(TeacherFormRequest $request, $teacher_id)
    {
        $data = $request->all();
        $teacher = Teacher::find($teacher_id);
        $teacher->update([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'gender_id'=>$data['gender_id'],
            'profile_id'=>$data['profile_id'],
            'school_id'=>$data['school_id'],
            'state_id'=>$data['state_id'],
        ]);
        if($data['password']){
            $teacher->update([
                'password'=>Hash::make($data['password'])
            ]);
        }
        session()->flash('message','School user agent updated successfully');
            return redirect()->route('admin.education.school.teacher.index',[strtolower($teacher->school->id)]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($teacher_id)
    {
        $teacher = Teacher::find($teacher_id);
        $teacher->delete();
        session()->flash('message','School user agent deleted successfully');
            return back();
    }
}
