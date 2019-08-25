<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class HospitalCategory extends BaseModel
{
    public function hospitals()
    {
    	return $this->hasMany(Hospital::class);
    }
}
