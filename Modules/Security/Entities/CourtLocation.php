<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class CourtLocation extends BaseModel
{
    public function town()
    {
    	return $this->belongsTo('Modules\Address\Entities\Town');
    }

    public function court()
    {
    	return $this->belongsTo(Court::class);
    }
}
