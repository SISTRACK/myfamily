<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class BusinessUndergoes extends BaseModel
{

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }

    public function business()
    {
    	return $this->belongsTo(Business::class);
    }
}
