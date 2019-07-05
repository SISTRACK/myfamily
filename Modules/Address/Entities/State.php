<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class State extends BaseModel
{

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function lgas()
    {
        return $this->hasMany(Lga::class);
    }
    public function government()
    {
        return $this->hasOne('Modules\Government\Entities\Government');
    }
    public function admin()
    {
        return $this->hasOne('Modules\Admin\Entities\Admin');
    }
}
