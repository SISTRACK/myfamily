<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Company extends BaseModel
{

    public function town()
    {
    	return $this->belongsTo(Town::class);
    }

    public function offices()
    {
    	return $this->hasMany(Office::class);
    }
}
