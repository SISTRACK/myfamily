<?php

namespace Modules\Government\Entities;

use Modules\Core\Entities\BaseModel;

class SchoolReportCollation extends BaseModel
{
    public function school()
    {
    	return $this->belongsTo('Modules\Education\Entities\School');
    }

    public function year()
    {
    	return $this->belongsTo(Year::class);
    }

    public function month()
    {
    	return $this->belongsTo(Month::class);
    }
}
