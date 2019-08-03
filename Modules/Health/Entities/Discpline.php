<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseMode;

class Discpline extends BaseMode
{
    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
