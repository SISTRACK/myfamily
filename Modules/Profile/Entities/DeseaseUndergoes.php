<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class DeseaseUndergoes extends BaseModel
{
 
    public function desease()
    {
    	return $this->belongsTo(Desease::class);
    }

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
