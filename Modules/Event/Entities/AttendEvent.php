<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class AttendEvent extends Model
{
    protected $guarded = [];

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }
}
