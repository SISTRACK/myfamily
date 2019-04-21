<?php

namespace Modules\Marriage\Entities;

use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{

    protected $guarded = [];

    public function marriages()
    {
    	return $this->hasMany(Marriage::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function status()
    {
    	return $this->belongsTo(Status::class);
    }

    public function mother()
    {
        return $this->hasOne('Modules\Birth\Entities\Mother');
    }
    
    public function validDatOfMarriage()
    {
        foreach ($this->marriages as $marriage) {
            if($marriage->is_active == 1){
                return $marriage->date;
            }
        }
    }
}
