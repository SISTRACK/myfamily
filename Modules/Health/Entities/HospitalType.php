<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class HospitalType extends BaseModel
{
    public function hospitals()
    {
    	return $this->hasMany(Hospital::class);
    }
}
