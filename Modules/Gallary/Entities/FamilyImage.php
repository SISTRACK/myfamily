<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class FamilyImage extends Model
{
   
    protected $guarded = [];

    public function image()
    {
    	return $this->belongsTo(GallaryImage::class);
    }

    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }
}
