<?php

namespace Modules\Government\Entities;

use Modules\Core\Entities\BaseModel;

class LgaSchoolReportCollation extends BaseModel
{
    public function lga()
    {
    	return $this->belongsTo('Modules\Address\Entities\Lga');
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
