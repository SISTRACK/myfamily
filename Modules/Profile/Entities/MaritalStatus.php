<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class MaritalStatus extends BaseModel
{

    public function profiles()
    {
    	return $this->belongsToMany(Profile::class);
    }
}
