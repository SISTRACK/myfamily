<?php

namespace Modules\Education\Entities;

use Modules\Core\Entities\BaseModel;

class Graduated extends BaseModel
{
    public function admitted()
    {
    	return $this->belongsTo(Admitted::class);
    }
}
