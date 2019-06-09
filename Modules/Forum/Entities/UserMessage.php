<?php

namespace Modules\Forum\Entities;

use Modules\Core\Entities\BaseModel;

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
    	return $this->belongsTo(Profile::class);
    }

    public function sender()
    {
    	return $this->profile->user->first_name.' '.$this->profile->user->first_name;
    }

    public function image()
    {
    	return $this->profile->image->name;
    }

    public function send_at()
    {
        return Carbon::create($this->created_at)->diffForHumans();
    }
    
}
