<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class DischargeCondition extends BaseModel
{
    public function dischargeAdmission()
    {
    	return $this->hasMany(DischargeAdmission::class);
    }
}
