<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class ProfileHealth extends BaseModel
{

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }

    public function desease()
    {
    	return $this->belongsTo(Desease::class);
    }

    public function bloodGroup()
    {
    	return $this->belongsTo(BloodGroup::class);
    }

    public function genotype()
    {
    	return $this->belongsTo(Genotype::class);
    }
}
