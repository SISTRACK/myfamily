<?php

namespace App;

use Modules\Core\Entities\BaseModel;

class Post extends BaseModel
{

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }

  public function blogImage()
  {
    return $this->hasOne(BlogImage::class);
  }
}
