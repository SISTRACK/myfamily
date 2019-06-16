<?php

namespace Modules\Birth\Entities;

use Modules\Core\Entities\BaseModel;

class Children extends BaseModel
{

    public function profile()
    {
        return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function birth()
    {
        return $this->hasOne(Birth::class,'child_id');
    }
    
}
