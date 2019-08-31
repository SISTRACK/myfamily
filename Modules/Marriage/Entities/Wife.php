<?php

namespace Modules\Marriage\Entities;

use Modules\Core\Entities\BaseModel;

class Wife extends BaseModel
{

    public function marriages()
    {
    	return $this->hasMany(Marriage::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function wifeStatus()
    {
    	return $this->belongsTo(WifeStatus::class);
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
