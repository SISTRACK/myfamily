<?php

namespace Modules\Education\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Education\Services\Traits\TeacherAndDashboard;

class Teacher extends Authenticatable
{
    use Notifiable, TeacherAndDashboard;
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
        'profile_id',
        'gender_id',
        'school_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function state()
    {
        return $this->belongsTo('Modules\Address\Entities\State');
    }

    public function profile()
    {
        return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
    
    public function gender()
    {
        return $this->belongsTo('Modules\Profile\Entities\Gender');
    }
}

