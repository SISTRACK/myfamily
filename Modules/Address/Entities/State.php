<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class State extends BaseModel
{

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function lgas()
    {
        return $this->hasMany(Lga::class);
    }
}
