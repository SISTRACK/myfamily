<?php
namespace Modules\Education\Services\Traits;

use Modules\Address\Entities\State;
use Modules\Profile\Entities\Gender;
use Modules\Education\Entities\School;
use Modules\Education\Entities\SchoolType;
use Modules\Education\Entities\SchoolCategory;

trait SchoolAndCategoriesRange
{
	public function nurseryIndex()
    {
        $schools = [];

        foreach ($this->availableSchools() as $school) {
            if($school->schoolType->name == 'Nursery'){
                $schools[] = $school;
            }
        }
        return view('education::Admin.School.index',[
                    'schools'=>$schools,
                    'school_types'=>SchoolType::all(),
                    'school_categories'=>SchoolCategory::all(),
                    'districts'=>$this->availableDistricts(),
                    'states'=>State::all(),
                    'genders'=>Gender::all()
                ]);
    }

    public function primaryIndex()
    {
        $schools = [];

        foreach ($this->availableSchools() as $school) {
            if($school->schoolType->name == 'Primary'){
                $schools[] = $school;
            }
        }

        return view('education::Admin.School.index',[
                    'schools'=>$schools,
                    'school_types'=>SchoolType::all(),
                    'school_categories'=>SchoolCategory::all(),
                    'districts'=>$this->availableDistricts(),
                    'states'=>State::all(),
                    'genders'=>Gender::all() 
                ]);
    }

    public function secondaryIndex()
    {
        $schools = [];

        foreach ($this->availableSchools() as $school) {
            if($school->schoolType->name == 'Secondary'){
                $schools[] = $school;
            }
        }
        return view('education::Admin.School.index',[
                    'schools'=>$schools,
                    'school_types'=>SchoolType::all(),
                    'school_categories'=>SchoolCategory::all(),
                    'districts'=>$this->availableDistricts(),
                    'states'=>State::all(),
                    'genders'=>Gender::all()
                    
                ]);
    }
}