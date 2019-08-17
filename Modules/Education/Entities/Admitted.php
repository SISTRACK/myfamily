<?php

namespace Modules\Education\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Education\Services\Traits\StudentGraduation as Graduatable;

class Admitted extends BaseModel
{
	use Graduatable;
	
    public function school()
    {
    	return $this->belongsTo(School::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function graduated()
    {
    	return $this->hasOne(Graduated::class);
    }

    public function schoolReports()
    {
        return $this->hasMany(SchoolReport::class);
    }
}
