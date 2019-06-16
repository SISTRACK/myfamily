<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class ProfileAccess extends BaseModel
{

    public function accessTo()
    {
    	return $this->belongsTo(Profile::class);
    }

    public function accessor()
    {
    	return $this->belongsTo(Profile::class);
    }
}
