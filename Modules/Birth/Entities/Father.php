<?php

namespace Modules\Birth\Entities;

use Modules\Core\Entities\BaseModel;

class Father extends BaseModel
{

    public function husband()
    {
        return $this->belongsTo('Modules\Marriage\Entities\Husband');
    }
    public function births()
    {
        return $this->hasMany(Birth::class);
    }
}
