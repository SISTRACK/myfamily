<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Location extends BaseModel
{

    public function families()
    {
    	return $this->hasMany('Modules\Family\Entities\Family');
    }

    public function town()
    {
    	return $this->belongsTo(Town::class);
    }
}
