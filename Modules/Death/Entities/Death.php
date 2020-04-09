<?php

namespace Modules\Death\Entities;

use Modules\Core\Entities\BaseModel;

class Death extends BaseModel
{

    public function profile()
    {
        return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function age()
    {
        $seconds = time() - $this->date;
        return floor($seconds/31536000);
    }
    
}
