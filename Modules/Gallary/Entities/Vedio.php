<?php

namespace Modules\Gallary\Entities;

use Modules\Core\Entities\BaseModel;

class Vedio extends BaseModel
{
    
    public function album()
    {
    	return $this->belongsTo(Album::class);
    }

}
