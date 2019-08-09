<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class PoliceStationCategory extends BaseModel
{
    public function policeStations()
    {
    	return $this->hasMany(PoliceStation::class);
    }
}
