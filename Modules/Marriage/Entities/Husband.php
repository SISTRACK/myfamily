<?php

namespace Modules\Marriage\Entities;

use Modules\Core\Entities\BaseModel;

class Husband extends BaseModel
{

    public function marriages()
    {
    	return $this->hasMany(Marriage::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
    public function father()
    {
    	return $this->hasOne('Modules\Birth\Entities\Father');
    }
}
