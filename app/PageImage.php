<?php

namespace App;

use Modules\Core\Entities\BaseModel;

class PageImage extends BaseModel
{
    public function page()
    {
    	return $this->belongsTo(Page::class);
    }
}
