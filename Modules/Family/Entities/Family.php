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

    public function getFamiliesUnderThisFamily()
    {
        $families = [];
        foreach ($this->subFamilies as $family) {
            $families[] = $this->find($family->sub_family_id);
        }
        return $families;
    }

    public function getFamilyAheadOfThisFamily()
    {
        $head_family = null;
        foreach (SubFamily::where('sub_family_id',$this->id)->get() as $family) {
            $head_family = $this->find($family->family_id);
        }
        return $head_family;
    }

    public function getHusbandFamilies()
    {
        $families = [];
        foreach($this->admin->profile->husband->father->births as $birth){
            if($birth->child->profile->gender->name == 'Female' && $birth->child->profile){
                foreach ($birth->child->profile->wife->mariages as $marriage) {
                    if($marriage->is_active == 1){
                        $families[] = $marriage->husband->profile->family;
                    }
                }
            }
        }
    }

    public function hasMarriedFemaleChild()
    {
        $flag = false;
        if($this->admin->profile->husband != null && $this->admin->profile->husband->father != null){
            foreach($this->admin->profile->husband->father->births as $birth){
                if($birth->child->profile->wife != null){
                    $flag = true;
                }
            } 
        }
        return $flag;
    }

    public function hasMarriedMaleChild()
    {

        $flag = false;
        if($this->admin->profile->husband != null && $this->admin->profile->husband->father != null){
            foreach($this->admin->profile->husband->father->births as $birth){
                if($birth->child->profile->husband != null){
                    $flag = true;
                }
            } 
        }
        
        return $flag;
    }
}
