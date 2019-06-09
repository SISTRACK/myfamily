<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;

class ExtendFamilyMessage extends Model
{
    protected $guarded = [];

    public function userMessage()
    {
    	return $this->belongsTo(UserMessage::class);
    }

    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }
    
}
