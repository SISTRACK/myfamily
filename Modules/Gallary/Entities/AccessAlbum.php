<?php

namespace Modules\Gallary\Entities;

use Modules\Core\Entities\BaseModel;

class AccessAlbum extends BaseModel
{

    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function album()
    {
    	return $this->belongsTo(Album::class);
    }
}
