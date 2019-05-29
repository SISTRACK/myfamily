<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function towns()
    {
        return $this->hasMany(Town::class);
    }
    
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
