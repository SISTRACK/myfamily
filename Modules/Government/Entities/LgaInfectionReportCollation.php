<?php

namespace Modules\Government\Entities;

use Modules\Core\Entities\BaseModel;

class LgaInfectionReportCollation extends BaseModel
{
    public function lga()
    {
    	return $this->belongsTo('Modules\Address\Entities\Lga');
    }
    
    public function infection()
    {
    	return $this->belongsTo('Modules\Health\Entities\Infection');
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
