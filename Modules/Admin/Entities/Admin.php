<?php

namespace Modules\Admin\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','phone'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function state()
    {
        return $this->belongsTo('Modules\Address\Entities\State');
    }

    public function lga()
    {
        return $this->belongsTo('Modules\Address\Entities\Lga');
    }

    public function district()
    {
        return $this->belongsTo('Modules\Address\Entities\District');
    }
}

