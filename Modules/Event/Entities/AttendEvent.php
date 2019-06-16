<?php

namespace Modules\Event\Entities;

use Modules\Core\Entities\BaseModel;

class AttendEvent extends BaseModel
{

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }

    public function attending()
    {
    	return 1;
    }

    public function mightAttend()
    {
    	return 1;
    }
}
