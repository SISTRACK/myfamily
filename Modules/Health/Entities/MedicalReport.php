<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class MedicalReport extends BaseModel
{

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
    
    public function doctor()
    {
    	return $this->belongsTo(Doctor::class);
    }

    public function diagnose()
    {
    	return $this->belongsTo(Diagnosis::class);
    }
    
}
