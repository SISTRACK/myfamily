<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Lga extends BaseModel
{

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function towns()
    {
        return $this->hasMany(Town::class);
    }

    public function government()
    {
        return $this->hasOne('Modules\Government\Entities\Government');
    }
  
    public function security()
    {
        return $this->hasOne('Modules\Security\Entities\Security');
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function admin()
    {
        return $this->hasOne('Modules\Admin\Entities\Admin');
    }

    public function lgaPopulationCollations()
    {
        return $this->hasMany('Modules\Government\Entities\LgaPopulationCollation');
    }

    public function lgaBirthCollations()
    {
        return $this->hasMany('Modules\Government\Entities\LgaBirthCollation');
    }

    public function lgaMarriageCollations()
    {
        return $this->hasMany('Modules\Government\Entities\LgaMarriageCollation');
    }
}
