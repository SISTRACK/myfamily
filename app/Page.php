<?php

namespace App;

use Modules\Core\Entities\BaseModel;

class Page extends BaseModel
{
    public function pageImages()
    {
    	return $this->hasMany(PageImage::class);
    }
    public function slug()
    {
    	
    	return strtolower(str_replace(' ', '-', $this->page));
    	
    }
}
