<?php

namespace Modules\Family\Entities;

use Modules\Core\Entities\BaseModel;

class Tribe extends BaseModel
{

    public function family()
    {
    	return $this->hasMany(Family::class);
    }
}
