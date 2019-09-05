<?php

namespace Modules\Government\Entities;

use Modules\Core\Entities\BaseModel;

class TownInfectionReportCollation extends BaseModel
{
    public function town()
    {
    	return $this->belongsTo('Modules\Address\Entities\Town');
    }

    public function infection()
    {
    	return $this->belongsTo('Modules\Health\Entities\Infection');
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
