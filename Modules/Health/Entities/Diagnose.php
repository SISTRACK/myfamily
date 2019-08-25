<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class Diagnose extends BaseModel
{
    public function hospitalAdmissions()
    {
    	return $this->hasMany(HospitalAdmission::class);
    }

    public function medicalCondition()
    {
    	return $this->belongsTo(MedicalCondition::class);
    }

    public function infection()
    {
    	return $this->belongsTo(Infection::class);
    }

    public function treatment()
    {
    	return $this->belongsTo(Treatment::class);
    }
}
