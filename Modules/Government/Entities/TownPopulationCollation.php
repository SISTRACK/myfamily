<?php

namespace Modules\Government\Entities;

use Modules\Core\Entities\BaseModel;

class TownPopulationCollation extends BaseModel
{
    public function town()
    {
    	return $this->belongsTo('Modules\Address\Entities\Town');
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
