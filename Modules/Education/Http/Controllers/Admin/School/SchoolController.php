<?php

namespace Modules\Education\Http\Controllers\Admin\School;


use Illuminate\Http\Response;
use Modules\Address\Entities\State;
use Modules\Profile\Entities\Gender;
use Modules\Education\Entities\School;
use Modules\Education\Entities\SchoolType;
use Modules\Education\Entities\SchoolCategory;
use Modules\Education\Http\Requests\Admin\SchoolFormRequest;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Education\Services\Traits\SchoolAndCategoriesRange as Schoolable;

class SchoolController extends AdminBaseController
{
    use Schoolable;

    public function index($school_id)
    {
        $school = School::find($school_id);
        switch ($school ? $school->schoolType->name : null) {
            case 'Nursery':
                $route = redirect()->route('admin.education.school.nursery.index');
                break;
            case 'Primary':
                $route = redirect()->route('admin.education.school.primary.index');
                break;
            case 'Secondary':
                $route = redirect()->route('admin.education.school.secondary.index');
                break;
            default:
                $route = view('education::Admin.School.index',[
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
        return view('education::Admin.School.create',
            [
                'school_types'=>SchoolType::all(),
                'school_categories'=>SchoolCategory::all(),
                'districts'=>$this->availableDistricts()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(SchoolFormRequest $request)
    {
        $data = $request->all();
        $school_type = SchoolType::find($data['school_type_id']);
        $school = $school_type->schools()->firstOrCreate([
            'name' => $data['name'],
            'school_type_id' => $data['school_type_id'],
            'school_category_id' => $data['school_category_id'],
        ]);
        $school->schoolLocation()->firstOrCreate([
            'address' => $data['address'],
            'town_id' => $data['town_id'],
        ]);
        session()->flash('message','School created successfully');
        return redirect()->route('admin.education.school.index',[$school->id]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(SchoolFormRequest $request, $school_id)
    {
        $data = $request->all();
        $school = School::find($school_id);
        $school->update([
            'name' => $data['name'],
            'school_type_id' => $data['school_type_id'],
            'school_category_id' => $data['school_category_id'],
        ]);
        $school->schoolLocation()->update([
            'address' => $data['address'],
            'town_id' => $data['town_id'],
        ]);
        session()->flash('message', 'School information updated successfully');
        return redirect()->route('admin.education.school.index',[$school->id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($school_id)
    {
        $school = School::find($school_id);
        foreach ($school->teachers as $teacher) {
            $teacher->delete();
        }
        $school->delete();
        $school->schoolLocation->delete();
        session()->flash('message', 'School deleted successfully');
        return back();
    }
}
