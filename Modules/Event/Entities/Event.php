<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
    public function familyEvent()
    {
    	return $this->hasOne(FamilyEvent::class);
    }
}
