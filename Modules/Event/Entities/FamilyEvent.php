<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class FamilyEvent extends Model
{
    protected $guarded = [];

    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }
    public function event()
    {
    	return $this->belongsTo(Event::class);
    }
}
