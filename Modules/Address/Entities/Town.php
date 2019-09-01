<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class Town extends BaseModel
{

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function courtLocations()
    {
        return $this->hasMany('Modules\Security\Entities\CourtLocation');
    }

    public function hospitalLocations()
    {
        return $this->hasMany('Modules\Health\Entities\HospitalLocation');
    }

    public function policeStationLocations()
    {
        return $this->hasMany('Modules\Security\Entities\PoliceStationLocation');
    }

    public function schoolLocations()
    {
        return $this->hasMany('Modules\Education\Entities\SchoolLocation');
    }

    public function townPopulationCollations()
    {
        return $this->hasMany('Modules\Government\Entities\TownPopulationCollation');
    }

    public function townBirthCollations()
    {
        return $this->hasMany('Modules\Government\Entities\TownBirthCollation');
    }

    public function townMarriageCollations()
    {
        return $this->hasMany('Modules\Government\Entities\TownMarriageCollation');
    }

}
