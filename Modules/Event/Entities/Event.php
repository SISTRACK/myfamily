<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
    public function timeRemain($date,$time)
    {
        return Carbon::create(date('Y',$date), date('m',$date), date('d',$date), date('h',$time), date('m',$time), date('s',$time))->diffForHumans();
    }
}
