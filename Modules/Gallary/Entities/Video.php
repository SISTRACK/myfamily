<?php

namespace Modules\Gallary\Entities;

use Modules\Core\Entities\BaseModel;

class Video extends BaseModel
{
    
    public function album()
    {
    	return $this->belongsTo(Album::class);
    }

}
