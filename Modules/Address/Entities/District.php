<?php

namespace Modules\Address\Entities;

use Modules\Core\Entities\BaseModel;

class District extends BaseModel
{
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
}
