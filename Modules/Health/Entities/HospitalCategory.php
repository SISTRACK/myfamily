<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\BaseModel;

class HospitalCategory extends BaseModel
{
    public function hospitals()
    {
    	return $this->hasMany(Hospital::class);
    }
}
