<?php

namespace Modules\Education\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Education\Services\Traits\SchoolGraduation as CanGraduate;

class School extends BaseModel
{
    use CanGraduate;

    public function schoolType()
    {
    	return $this->belongsTo(SchoolType::class);
    }

    public function schoolCategory()
    {
    	return $this->belongsTo(SchoolCategory::class);
    }

    public function schoolLocation()
    {
    	return $this->hasOne(SchoolLocation::class);
    }
    public function teachers()
    {
    	return $this->hasMany(Teacher::class);
    }
    public function admitteds()
    {
        return $this->hasMany(Admitted::class);
    }
}
