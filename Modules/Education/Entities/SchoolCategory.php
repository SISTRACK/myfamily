<?php

namespace Modules\Education\Entities;

use Modules\Core\Entities\BaseModel;

class SchoolCategory extends BaseModel
{
    public function schools()
    {
    	return $this->hasMany(School::class);
    }
}
