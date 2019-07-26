<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Address extends BaseModel
{

    public function leave()
    {
        return $this->hasOne(LivesIn::class);
    }
    public function leavesIn()
    {
        return $this->hasMany(LivesIn::class);
    }
    public function work()
    {
        return $this->hasOne(WorkIn::class);
    }

     public function office()
    {
        return $this->belongsTo(Office::class);
    }

     public function house()
    {
        return $this->belongsTo(House::class);
    }
}
