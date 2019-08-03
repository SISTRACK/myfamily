<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\BaseModel;

class HospitalLocation extends BaseModel
{

    public function hospital()
    {
    	return $this->belongsTo(Hospital::class);
    }
    public function town()
    {
    	return $this->belongsTo('Modules\Address\Entities\Town');
    }
}
