<?php

namespace Modules\Security\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Security extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name',
        'email', 
        'password',
        'phone',
        'state_id',
        'court_id',
        'gender_id',
        'profile_id',
        'police_station_id'
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
    public function profile()
    {
        return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
    public function court()
    {
        return $this->belongsTo(Court::class);
    }
    public function policeStation()
    {
        return $this->belongsTo(PoliceStation::class);
    }
    public function securityReports()
    {
        return $this->hasMany(SecurityReport::class);
    }

    public function gender()
    {
        return $this->belongsTo('Modules\Profile\Entities\Gender');
    }
    
}

