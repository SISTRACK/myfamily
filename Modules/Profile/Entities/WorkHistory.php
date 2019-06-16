<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class WorkHistory extends BaseModel
{

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
