<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class LifeStatus extends BaseModel
{

    public function profile()
    {
    	return $this->hasMany(Profile::class);
    }
}
