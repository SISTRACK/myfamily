<?php

namespace Modules\Education\Entities;

use Modules\Core\Entities\BaseModel;


class SchoolLocation extends BaseModel
{
    public function school()
    {
    	return $this->belongsTo(School::class);
    }

    public function town()
    {
    	return $this->belongsTo('Modules\Address\Entities\Town');
    }
}
