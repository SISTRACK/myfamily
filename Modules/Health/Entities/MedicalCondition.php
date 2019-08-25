<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class MedicalCondition extends BaseModel
{
    public function diagnose()
    {
    	$this->hasMany(Diagnose::class);
    }
}
