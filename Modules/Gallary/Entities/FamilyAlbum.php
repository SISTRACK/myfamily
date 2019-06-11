<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class FamilyVedio extends Model
{
    protected $guarded = [];

    public function vedio()
    {
    	return $this->belongsTo(Vedio::class);
    }

    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }
}
