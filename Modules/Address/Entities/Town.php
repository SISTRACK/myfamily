<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $guarded = [];

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
