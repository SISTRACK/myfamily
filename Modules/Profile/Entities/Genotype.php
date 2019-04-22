<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class Genotype extends Model
{
    protected $guarded = [];

    public function profileHealth()
    {
    	return $this->hasMany(ProfileHealth::class);
    }
}
