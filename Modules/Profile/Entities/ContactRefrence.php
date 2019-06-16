<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class ContactRefrence extends BaseModel
{
	
    public function contact()
    {
    	return $this->hasMany(UserContact::class);
    }
}
