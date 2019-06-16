<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class WorkIn extends BaseModel
{

    public function profile()
    {
        return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
