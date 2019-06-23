<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class Doctor extends BaseModel
{
    public function hospital()
    {
    	return $this->belongsTo(Hospital::class);
    }

    public function medicalReports()
    {
    	return $this->hasMany(MedicalReport::class);
    }
}
