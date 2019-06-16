<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\BaseModel;

class FamilyAdmin extends BaseModel
{

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }
}
