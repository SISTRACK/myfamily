<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Office extends BaseModel
{
   
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
