<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{

	protected $guarded = [];

    public function image()
    {
    	return $this->belongsTo(GallaryImage::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
}
