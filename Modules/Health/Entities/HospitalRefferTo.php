<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class HospitalRefferTo extends BaseModel
{
    public function medicalReport()
    {
    	return $this->belongsTo(MedicalReport::class);
    }
}
