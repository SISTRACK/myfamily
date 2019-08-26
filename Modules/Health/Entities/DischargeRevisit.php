<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class DischargeRevisit extends BaseModel
{
    public function dischargeAdmission()
    {
    	return $this->belongsTo(DischargeAdmission::class);
    }
}
