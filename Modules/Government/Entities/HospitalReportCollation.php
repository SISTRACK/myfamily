<?php

namespace Modules\Government\Entities;

use Modules\Core\Entities\BaseModel;

class HospitalReportCollation extends BaseModel
{
    public function hospital()
    {
    	return $this->belongsTo('Modules\Health\Entities\Hospital');
    }

    public function year()
    {
    	return $this->belongsTo(Year::class);
    }

    public function Month()
    {
    	return $this->belongsTo(Month::class);
    }
}
