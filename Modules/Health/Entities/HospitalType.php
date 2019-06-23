<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class HospitalType extends BaseModel
{
    public function hospital()
    {
    	return $this->hasModel(Hospital::class);
    }
}
