<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class BloodGroup extends BaseModel
{

    public function profileHealth()
    {
    	return $this->hasMany(ProfileHealth::class);
    }
}
