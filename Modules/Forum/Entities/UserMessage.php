<?php

namespace Modules\Forum\Entities;

use Modules\Core\Entities\BaseModel;
use Illuminate\Support\Carbon;

class UserMessage extends BaseModel
{

    protected $guarded = [];

    public function extendFamilyMessage()
    {
    	return $this->hasOne(ExtendFamilyMessage::class);
    }
    public function nuclearFamilyMessage()
    {
    	return $this->hasOne(FamilyMessage::class);
    }
    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
    public function message()
    {
    	return $this->belongsTo(Message::class);
    }
    public function sender()
    {
    	return $this->profile->user->first_name.' '.$this->profile->user->last_name;
    }

    public function image()
    {
    	return $this->profile->image->name;
    }

    public function send_at()
    {

    	$date = strtotime($this->created_at);
        return Carbon::create(date('Y',$date), date('m',$date), date('d',$date), date('H',$date), date('i',$date), date('s',$date))->diffForHumans();
    }
    
}
