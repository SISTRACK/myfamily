<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class Desease extends BaseModel
{

    public function deseaseUndergoes()
    {
    	return $this->hasMany(DeseaseUndergoes::class);
    }

    public function profileHealth()
    {
    	return $this->hasMany(ProfileHealth::class);
    }
}
