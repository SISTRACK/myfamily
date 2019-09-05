<?php

namespace Modules\Government\Entities;

use Modules\Core\Entities\BaseModel;

class AreaInfectionReportCollation extends BaseModel
{
    public function area()
    {
    	return $this->belongsTo('Modules\Address\Entities\Area');
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
