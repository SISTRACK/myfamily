<?php

namespace Modules\Family\Entities;

use Modules\Core\Entities\BaseModel;

class Religion extends BaseModel
{
    
    public function family()
    {
    	return $this->hasMany(Family::class);
    }
}
