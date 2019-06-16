<?php

namespace Modules\Divorce\Entities;

use Modules\Core\Entities\BaseModel;

class DivorceDetail extends BaseModel
{

    public function divorce()
    {
    	return $this->belongsTo(Divorce::class);
    }
    public function return()
    {
    	return $this->hasOne(ReturnDetail::class);
    }
}
