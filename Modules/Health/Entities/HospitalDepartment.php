<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class HospitalDepartment extends BaseModel
{
    public function doctors()
    {
    	return $this->hasMany(Doctor::class);
    }
}
