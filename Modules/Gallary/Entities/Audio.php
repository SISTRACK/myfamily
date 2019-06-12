<?php

namespace Modules\Gallary\Entities;

use Modules\Core\Entities\BaseModel;

class Audio extends BaseModel
{
    
    public function album()
    {
    	return $this->belongsTo(Album::class);
    }

}
