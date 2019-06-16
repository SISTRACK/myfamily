<?php

namespace Modules\Event\Entities;

use Modules\Core\Entities\BaseModel;

class FamilyEvent extends BaseModel
{
   
    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }

    public function AttendEvents()
    {
    	return $this->hasMany(AttendEvent::class);
    }
}
