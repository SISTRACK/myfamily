<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Area extends BaseModel
{

    public function houses()
    {
        return $this->hasMany(House::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function areaPopulationCollations()
    {
        return $this->hasMany('Modules\Government\Entities\AreaPopulationCollation');
    }
    
    public function areaBirthCollations()
    {
        return $this->hasMany('Modules\Government\Entities\AreaBirthCollation');
    }
    
    public function areaMarriageCollations()
    {
        return $this->hasMany('Modules\Government\Entities\AreaMarriageCollation');
    }

    public function areaInfectionReportCollations()
    {
        return $this->hasMany('Modules\Government\Entities\AreaInfectionReportCollation');
    }
    public function areaHospitalReportCollations()
    {
        return $this->hasMany('Modules\Government\Entities\AreaHospitalReportCollation');
    }
    public function areaSchoolReportCollations()
    {
        return $this->hasMany('Modules\Government\Entities\AreaSchoolReportCollation');
    }
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
