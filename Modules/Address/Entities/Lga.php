<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Lga extends BaseModel
{

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function towns()
    {
        return $this->hasMany(Town::class);
    }
    
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
