<?php

namespace Modules\Family\Entities;

use Modules\Core\Entities\BaseModel;

class FamilyProfileCount extends BaseModel
{
    public function family()
    {
        return $this->belongsTo(Family::Class);
    }

    public function profile()
    {
        return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
}
