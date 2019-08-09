<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class PoliceStationType extends BaseModel
{
    public function policeStations()
    {
    	return $this->hasMany(PoliceStation::class);
    }
}
