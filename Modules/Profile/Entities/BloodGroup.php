<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    protected $guarded = [];

    public function profileHealth()
    {
    	return $this->hasMany(ProfileHealth::class);
    }
}
