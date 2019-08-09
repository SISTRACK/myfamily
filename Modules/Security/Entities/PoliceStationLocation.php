<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class PoliceStationLocation extends BaseModel
{
    public function policeStation()
    {
    	return $this->belongsTo(PoliceStation::class);
    }

    public function town()
    {
    	return $this->belongsTo('Modules\Address\Entities\Town');
    }
}
