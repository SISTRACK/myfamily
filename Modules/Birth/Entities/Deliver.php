<?php

namespace Modules\Birth\Entities;

use Modules\Core\Entities\BaseModel;

class Deliver extends BaseModel
{
    public function births()
    {
    	return $this->belongsToMany(Birth::class);
    }
}
