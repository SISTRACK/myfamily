<?php

namespace Modules\Forum\Entities;

use Modules\Core\Entities\BaseModel;

class Message extends BaseModel
{

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
