<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class Desease extends Model
{
    protected $guarded = [];

    public function deseaseUndergoes()
    {
    	return $this->hasMany(DeseaseUndergoes::class);
    }

    public function profileHealth()
    {
    	return $this->hasMany(ProfileHealth::class);
    }
}
