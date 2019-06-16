<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class Image extends BaseModel
{
    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
