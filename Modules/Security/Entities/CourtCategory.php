<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class CourtCategory extends BaseModel
{
    public function court()
    {
    	return $this->hasMany(Court::class)
    }
}
