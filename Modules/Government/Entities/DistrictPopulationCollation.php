<?php

namespace Modules\Government\Entities;

use Modules\Core\Entities\BaseModel;

class DistrictPopulationCollation extends BaseModel
{
    public function district()
    {
    	return $this->belongsTo('Modules\Address\Entities\District');
    }

    public function year()
    {
    	return $this->belongsTo(Year::class);
    }

    public function Month()
    {
    	return $this->belongsTo(Month::class);
    }
}
