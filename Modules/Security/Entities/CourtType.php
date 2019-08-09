<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class CourtType extends BaseModel
{
    public function courts()
    {
    	return $this->hasMany(Court::class);
    }
}
