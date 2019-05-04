<?php

namespace Modules\Family\Entities;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $guarded = [];
    
    public function admin()
    {
    	return $this->hasOne('Modules\Admin\Entities\FamilyAdmin');
    }

    public function events()
    {
    	return $this->hasMany('Modules\Event\Entities\FamilyEvent');
    }
    public function subFamilies()
    {
        return $this->hasMany(SubFamily::class,'sub_family_id');
    }
    public function headFamily()
    {
        return $this->hasOne(SubFamily::class,'family_id');
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

    public function getFamiliesUnderThisFamily()
    {
        $families = [];
        foreach ($this->subFamilies as $family) {
            $families[] = $family->family;
        }
        return $families;
    }

    public function getFamilyAheadOfThisFamily()
    {
        return $this->headFamily->family;
    }
}
