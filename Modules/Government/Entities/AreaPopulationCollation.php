<?php

namespace Modules\Government\Entities;

use Modules\Core\Entities\BaseModel;


class AreaPopulationCollation extends BaseModel
{
    public function area()
    {
    	return $this->belongsTo('Modules\Address\Entities\Area');
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
