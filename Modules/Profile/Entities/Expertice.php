<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class Expertice extends Model
{
    protected $fillable = ['name'];

    public function profileExpertice()
    {
    	return $this->hasMany(ProfileExpertice::class);
    }
}
