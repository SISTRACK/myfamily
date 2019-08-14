<?php

namespace Modules\Education\Entities;

use Modules\Core\Entities\BaseModel;

class Admitted extends BaseModel
{
    public function school()
    {
    	return $this->belongsTo(School::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
}
