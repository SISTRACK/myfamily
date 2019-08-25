<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class DischargeAdmission extends BaseModel
{
	
    public function hospitalAdmission()
    {
    	return $this->belongsTo(HospitalAdmission::class);
    }

    public function dischargeRevisit()
    {
    	return $this->belongsTo(DischargeRevisit::class);
    }

    public function dischargeCondition()
    {
    	return $this->belongsTo(DischargeCondition::class);
    }

    public function doctor()
    {
    	return $this->belongsTo(Doctor::class);
    }
}
