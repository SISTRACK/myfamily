<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Country extends BaseModel
{

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
