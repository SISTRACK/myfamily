<?php

namespace Modules\Security\Entities;

use Modules\Core\Entities\BaseModel;

class Court extends BaseModel
{
    public function courtCategory()
    {
    	return $this->belongsTo(CourtCategory::class);
    }

    public function courtType()
    {
    	return $this->belongsTo(CourtType::class);
    }

    public function securities()
    {
    	return $this->hasMany(Security::class);
    }

    public function courtLocation()
    {
    	return $this->hasOne(CourtLocation::class);
    }
}
