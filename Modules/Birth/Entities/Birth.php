<?php

namespace Modules\Birth\Entities;

use Modules\Core\Entities\BaseModel;

class Birth extends BaseModel
{

    public function father()
    {
        return $this->belongsTo(Father::class);
    }

    public function child()
    {
        return $this->belongsTo(Children::class);
    }

    public function mother()
    {
        return $this->belongsTo(Mother::class);
    }

    public function deliver()
    {
        return $this->belongsTo(Deliver::class);
    }
}
