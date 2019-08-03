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
    	return $this->belongsTo(HospitalType::class);
    }

    public function district()
    {
    	return $this->belongsTo('Modules\Address\Entities\District');
    }
    public function hospitalCategory()
    {
    	return $this->belongsTo(HospitalCategory::class);
    }
    public function hospitalLocation()
    {
    	return $this->hasOne(HospitalLocation::class);
    }
}
