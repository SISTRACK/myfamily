<?php

namespace Modules\Family\Entities;

use Modules\Core\Entities\BaseModel;

class AreaFamilyCount extends BaseModel
{
    public function family()
    {
        return $this->belongsTo(Family::Class);
    }

    public function area()
    {
        return $this->belongsTo('Modules\Address\Entities\Area');
    }

}
