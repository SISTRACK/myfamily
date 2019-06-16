<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Area extends BaseModel
{

    public function houses()
    {
        return $this->hasMany(House::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function town()
    {
        return $this->belongsTo(Town::class);
    }
}
