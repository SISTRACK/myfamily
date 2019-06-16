<?php

namespace Modules\Event\Entities;

use Modules\Core\Entities\BaseModel;

class Announcement extends BaseModel
{

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
    
}
