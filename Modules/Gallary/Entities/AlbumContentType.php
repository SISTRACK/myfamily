<?php

namespace Modules\Gallary\Entities;

use Modules\Core\Entities\BaseModel;

class AlbumContentType extends BaseModel
{
    public function albums()
    {
    	return $this->hasMany(Album::class);
    }
}
