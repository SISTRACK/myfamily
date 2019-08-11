<?php

namespace Modules\Education\Entities;

use Illuminate\Database\Eloquent\Model;

class SchoolLocation extends Model
{
    public function school()
    {
    	return $this->belongsTo(School::class);
    }

    public function town()
    {
    	return $this->belongsTo('Modules\Address\Entities\Town');
    }
}
