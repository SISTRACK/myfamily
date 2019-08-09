<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class PoliceStation extends BaseModel
{
    public function securities()
    {
    	return $this->hasMany(Security::class);
    }

    public function policeStationLocation()
    {
    	return $this->hasOne(PoliceStationLocation::class);
    }

    public function policeStationCategory()
    {
    	return $this->belongsTo(PoliceStationCategory::class);
    }

    public function policeStationType()
    {
    	return $this->belongsTo(PoliceStationType::class);
    }
}
