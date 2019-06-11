<?php

namespace Modules\Gallary\Entities;

use Modules\Core\Entities\BaseModel;

class ProfileAlbum extends BaseModel
{

    public function album()
    {
    	return $this->belongsTo(Album::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
    
}
