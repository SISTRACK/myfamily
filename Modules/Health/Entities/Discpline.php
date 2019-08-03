<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class Discpline extends BaseModel
{
    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
