<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class GalarryImage extends Model
{
    protected $guarded = [];

    public function userImage()
    {
    	return $this->hasOne(UserImage::class,'image_id');
    }

    public function familyImage()
    {
    	return $this->hasOne(FamilyImage::class,'image_id');
    }
   
}
