<?php

namespace Modules\Gallary\Entities;

use Modules\Core\Entities\BaseModel;

class FamilyAlbum extends BaseModel
{

    public function album()
    {
    	return $this->belongsTo(Album::class);
    }

    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }
}
