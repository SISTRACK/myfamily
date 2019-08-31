<?php

namespace Modules\Government\Entities;

use Illuminate\Database\Eloquent\Model;

class AreaPopulationCollation extends Model
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
