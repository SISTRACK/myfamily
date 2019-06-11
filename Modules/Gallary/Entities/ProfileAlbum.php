<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class UserVedio extends Model
{

    protected $guarded = [];

    public function vedio()
    {
    	return $this->belongsTo(Vedio::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
}
