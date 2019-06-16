<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;

class ProfileExperience extends BaseModel
{

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
