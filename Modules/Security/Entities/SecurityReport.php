<?php

namespace Modules\Security\Entities;

use Illuminate\Database\Eloquent\Model;

class SecurityReport extends Model
{
    public function profile()
    {
        return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function profile()
    {
        return $this->belongsTo(Security::class);
    }
}
