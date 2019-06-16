<?php

namespace Modules\Divorce\Entities;

use Modules\Core\Entities\BaseModel;

class Divorce extends BaseModel
{

    public function marriage()
    {
        return $this->belongsTo('Modules\Marriage\Entities\Marriage');
    }

    public function details()
    {
        return $this->hasMany(DivorceDetail::class);
    }
}
