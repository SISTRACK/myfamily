<?php

namespace Modules\Birth\Entities;

use Modules\Core\Entities\BaseModel;

class Mother extends BaseModel
{

    public function wife()
    {
        return $this->belongsTo('Modules\Marriage\Entities\Wife');
    }
    
    public function births()
    {
        return $this->hasMany(Birth::class);
    }
}
