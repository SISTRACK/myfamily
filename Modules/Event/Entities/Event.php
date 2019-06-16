<?php

namespace Modules\Event\Entities;

use Modules\Core\Entities\BaseModel;
use Illuminate\Support\Carbon;

class Event extends BaseModel
{

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
        return Carbon::create(date('Y',$date), date('m',$date), date('d',$date), date('H',$time), date('i',$time), date('s',$time))->diffForHumans();
    }

    public function attending()
    {
        $count = 0;
        foreach ($this->familyEvent->attendEvents()->get() as $attending) {
            if($attending->status == 1){
                $count ++;
            }
        }
        return $count;
    }

    public function mightAttend()
    {
        $count = 0;
        foreach ($this->familyEvent->attendEvents()->get() as $attending) {
            if($attending->status == 2){
                $count ++;
            }
        }
        return $count;
    }

    public function familyMembersThatAreAttending()
    {
        $users = [];
        foreach ($this->familyEvent->attendEvents()->get() as $attending) {
            if($attending->status == 1){
                $users[] = $attending->profile;
            }
        }
        return $users;
    }

    public function familyMembersThatMightAttend()
    {
        $users = [];
        foreach ($this->familyEvent->attendEvents()->get() as $attending) {
            if($attending->status == 2){
                $users[] = $attending->profile;
            }
        }
        return $users;
    }

}
