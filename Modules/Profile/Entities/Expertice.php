<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class Expertice extends BaseModel
{

    public function profileExpertice()
    {
    	return $this->hasMany(ProfileExpertice::class);
    }
}
