<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class Experience extends BaseModel
{
    
    public function profileExperiences()
    {
    	return $this->hasMany(ProfileExperience::class);
    }
}
