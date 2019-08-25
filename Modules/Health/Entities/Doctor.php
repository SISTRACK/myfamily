<?php

namespace Modules\Health\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Modules\Health\Services\Traits\DiagnoseAble;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use Notifiable, DiagnoseAble;
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
        'state_id',
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

    public function state()
    {
        return $this->belongsTo('Modules\Address\Entities\State');
    }
    public function medicalReport()
    {
        return $this->hasMany(MedicalReport::class);
    }
}
