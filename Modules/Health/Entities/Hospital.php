<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class Hospital extends BaseModel
{
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function hospitalType()
    {
    	return $this->belongsTo(Hospital::class);
    }
}
