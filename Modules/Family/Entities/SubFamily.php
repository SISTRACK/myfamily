<?php

namespace Modules\Family\Entities;

use Modules\Core\Entities\BaseModel;

class SubFamily extends BaseModel
{

    public function family()
    {
    	return $this->belongsTo(Family::class);
    }
}
