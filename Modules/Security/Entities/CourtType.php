<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class CourtType extends Model
{
    public function court()
    {
    	return $this->hasMany(Court::class)
    }
}
