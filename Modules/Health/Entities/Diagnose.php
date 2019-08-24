<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class Diagnose extends BaseModel
{
    public function medicalReport()
    {
    	return $this->hasOne(MedicalReport::class);
    }
}
