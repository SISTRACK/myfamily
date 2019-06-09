<?php

namespace Modules\Family\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Family\Services\Traits\RelatedFamilies;

class Family extends Model
{
    use RelatedFamilies;

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
        return $this->hasMany(SubFamily::class);
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

    public function nuclearFamilyMessages()
    {
        return $this->hasMany('Modules\Forum\Entities\FamilyMessage');
    }

    public function extendedFamilyMessages()
    {
        return $this->hasMany('Modules\Forum\Entities\ExtendFamilyMessage');
    }

}
