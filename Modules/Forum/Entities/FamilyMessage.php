<?php

namespace Modules\Forum\Entities;

use Modules\Core\Entities\BaseModel;

class FamilyMessage extends BaseModel
{

    public function userMessage()
    {
    	return $this->belongsTo(UserMessage::class);
    }

    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }
}
