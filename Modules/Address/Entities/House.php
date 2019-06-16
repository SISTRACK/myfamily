<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class House extends BaseModel
{
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
