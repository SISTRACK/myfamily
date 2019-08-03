<?php

namespace Modules\Health\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
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
        'phone', 
        'password',
        'hospital_id',
        'gender_id',
        'profile_id',
        'discpline_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function discpline()
    {
        return $this->belongsTo(Discpline::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function gender()
    {
        return $this->belongsTo('Modules\Profile\Entities\Gender');
    }

    public function profile()
    {
        return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
}
