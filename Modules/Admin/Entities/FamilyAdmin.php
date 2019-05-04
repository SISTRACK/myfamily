<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class FamilyAdmin extends Model
{
    protected $guarded = [];

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }
}
