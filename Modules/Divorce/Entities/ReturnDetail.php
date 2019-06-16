<?php

namespace Modules\Divorce\Entities;

use Modules\Core\Entities\BaseModel;

class ReturnDetail extends BaseModel
{
    
    public function divorceDetail()
    {
    	return $this->belongsTo(DivorceDetail::class);
    }
}
