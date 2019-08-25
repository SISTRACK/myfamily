<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class Infection extends BaseModel
{
    public function diagnoses()
    {
    	return $this->hasMany(Diagnose::class);
    }
}
