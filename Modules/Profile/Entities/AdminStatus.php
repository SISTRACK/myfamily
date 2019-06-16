<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class AdminStatus extends BaseModel
{

    public function admins()
    {
    	return $this->hasMany(Amin::class);
    }
}
