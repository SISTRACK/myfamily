<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Town extends BaseModel
{

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function locations()
    {
    	return $this->hasMany(Location::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
