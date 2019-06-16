<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class Business extends BaseModel
{

    public function businessUndergoes()
    {
    	return $this->hasMany(BusinessUndergoes::class);
    }
    
}
