<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class ProfileExperience extends Model
{
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
