<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $guarded = [];

    public function profileExperiences()
    {
    	return $this->hasMany(ProfileExperience::class);
    }
}
