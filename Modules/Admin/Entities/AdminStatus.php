<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminStatus extends Model
{
    protected $guarded = [];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
}
