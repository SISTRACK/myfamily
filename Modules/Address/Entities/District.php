<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

use Modules\Address\Services\DistrictInforUpdate;

class District extends BaseModel
{
	use DistrictInforUpdate;
	
	public function towns()
	{
		return $this->hasMany(Town::class);
	}

	public function lga()
	{
		return $this->belongsTo(Lga::class);
	}

	public function government()
    {
        return $this->hasOne('Modules\Government\Entities\Government');
    }

    public function security()
    {
        return $this->hasOne('Modules\Security\Entities\Security');
    }
    
    public function admin()
    {
        return $this->hasOne('Modules\Admin\Entities\Admin');
    }
    
    public function districtPopulationCollations()
    {
        return $this->hasMany('Modules\Government\Entities\DistrictPopulationCollation');
    }

    public function districtBirthCollations()
    {
        return $this->hasMany('Modules\Government\Entities\DistrictBirthCollation');
    }

    public function districtMarriageCollations()
    {
        return $this->hasMany('Modules\Government\Entities\DistrictMarriageCollation');
    }

    public function districtInfectionReportCollations()
    {
        return $this->hasMany('Modules\Government\Entities\DistrictInfectionReportCollation');
    }
    public function districtHospitalReportCollations()
    {
        return $this->hasMany('Modules\Government\Entities\DistrictHospitalReportCollation');
    }
    public function districtSchoolReportCollations()
    {
        return $this->hasMany('Modules\Government\Entities\DistrictSchoolReportCollation');
    }
}
