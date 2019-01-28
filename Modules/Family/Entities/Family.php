<?php

namespace Modules\Family\Entities;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $guarded = [];
    
    public function admin()
    {
    	return $this->hasOne('Modules\Admin\Entities\Admin');
    }

    public function familyEvents()
    {
    	return $this->hasMany('Modules\Event\Entities\FamilyEvent');
    }
    public function subFamilies()
    {
        return $this->hasMany(SubFamily::class);
    }
    public function location()
    {
        return $this->belongsTo('Modules\Address\Entities\Location');
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function religion()
    {
    	return $this->belongsTo(Religion::class);
    }

    public function tribe()
    {
    	return $this->belongsTo(Tribe::class);
    }

    public function profiles()
    {
    	return $this->hasMany('Modules\Profile\Entities\Profile');
    }

    public function image()
    {
    	return $this->hasMany(Image::class);
    }

    public function vedio()
    {
    	return $this->hasMany(Vedio::class);
    }
}
