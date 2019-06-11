<?php

namespace Modules\Gallary\Entities;

use Modules\Core\Entities\BaseModel;

class Photo extends BaseModel
{

    public function album()
    {
    	return $this->belongsTo(UserImage::class);
    }
   
}
