<?php

namespace Modules\Health\Entities;

use Modules\Core\Entities\BaseModel;

class Infection extends BaseModel
{
    public function diagnoses()
    {
    	return $this->hasMany(Diagnose::class);
    }

    public function townMedicalReports()
    {
    	return $this->hasMany(TownMedicalReport::class);
    }

    public function areaInfectionCollations()
    {
    	return $this->hasMany('Modules\Government\Entities\AreaInfectionCollation');
    }

    public function townInfectionCollations()
    {
    	return $this->hasMany('Modules\Government\Entities\TownInfectionCollation');
    }

    public function districtInfectionCollations()
    {
    	return $this->hasMany('Modules\Government\Entities\DistrictInfectionCollation');
    }

    public function lgaInfectionCollations()
    {
    	return $this->hasMany('Modules\Government\Entities\LgaInfectionCollation');
    }
}
