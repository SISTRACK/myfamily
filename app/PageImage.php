<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    public function post()
    {
    	retirn $this->belongsTo(Post::class);
    }

    public function page()
    {
    	retirn $this->belongsTo(Page::class);
    }
}
