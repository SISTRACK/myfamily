<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class CourtCategory extends BaseModel
{
    public function courts()
    {
    	return $this->hasMany(Court::class)
    }
}
