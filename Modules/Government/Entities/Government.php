<?php

namespace Modules\Government\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Government extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','last_name','phone'
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

