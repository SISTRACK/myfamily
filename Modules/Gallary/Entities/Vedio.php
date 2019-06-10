<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class Vedio extends Model
{
    protected $fillable = [];

    public function userVedio()
    {
    	return $this->hasOne(UserVedio::class);
    }

    public function familyVedio()
    {
    	return $this->hasOne(FamilyVedio::class);
    }
}
