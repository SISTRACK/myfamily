<?php

namespace Modules\Marriage\Entities;

use Modules\Core\Entities\BaseModel;

class Status extends BaseModel
{

    public function wives()
    {
    	return $this->hasMany(Wife::class);
    }
    
}
