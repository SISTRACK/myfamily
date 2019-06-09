<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function userMessages()
    {
    	return $this->hasMany(UserMessage::class);
    }

    public function familyMessages()
    {
    	return $this->hasMany(FamilyMessage::class);
    }

    public function extendedFamilyMessages()
    {
    	return $this->hasMany(ExtendFamilyMessage::class);
    }
}
