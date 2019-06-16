<?php

namespace Modules\Marriage\Entities;

use Modules\Core\Entities\BaseModel;

class Marriage extends BaseModel
{

    public function wife()
    {
        return $this->belongsTo(Wife::class);
    }

    public function husband()
    {
        return $this->belongsTo(Husband::class);
    }

    public function divorce()
    {
        return $this->hasOne('Modules\Divorce\Entities\Divorce');
    }
}
