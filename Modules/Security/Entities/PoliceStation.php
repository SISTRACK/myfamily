<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class PoliceStation extends BaseModel
{
    public function security()
    {
    	return $this->hasMany(Security::class);
    }
}
