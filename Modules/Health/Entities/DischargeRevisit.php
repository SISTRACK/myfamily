<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class HospitalRevisit extends BaseModel
{
    public function dischargeRevisit()
    {
    	return $this->belongsTo(DischargeRevisit::class);
    }
}
