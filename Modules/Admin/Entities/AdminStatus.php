<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\BaseModel;

class AdminStatus extends BaseModel
{

    public function admins()
    {
        return $this->hasMany(SystemAdmin::class);
    }
}
