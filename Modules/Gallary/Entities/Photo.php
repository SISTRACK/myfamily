<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];

    public function album()
    {
    	return $this->belongsTo(UserImage::class);
    }
   
}
