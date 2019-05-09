<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class ProfileAccess extends Model
{
    protected $guarded = [];

    public function accessTo()
    {
    	return $this->belongsTo(Profile::class);
    }

    public function accessor()
    {
    	return $this->belongsTo(Profile::class);
    }
}
