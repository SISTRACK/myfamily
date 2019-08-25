<?php

namespace Modules\Profile\Services\Traits;

use Modules\Profile\Services\Traits\Expertices;

use Modules\Profile\Services\Traits\Experiences;

use Modules\Profile\Services\Traits\Health;

use Modules\Profile\Services\Traits\Address;

use Modules\Profile\Services\Traits\FamilyMembers;

use Modules\Profile\Services\Traits\Relatives;

use Modules\Profile\Services\Traits\CreateWorkHistory;

trait ProfileEloquentRelations

{
    use Relatives, Expertices, CreateWorkHistory, Experiences, Health, FamilyMembers, Address;

	public function child()
    {
    	return $this->hasOne('Modules\Birth\Entities\Children');
    }
    public function doctor()
    {
        return $this->hasOne('Modules\Health\Entities\Doctor');
    }
    public function admitteds()
    {
        return $this->hasMany('Modules\Education\Entities\Admitted');
    }
    public function admin()
    {
        return $this->hasOne('Modules\Admin\Entities\FamilyAdmin');
    }
    public function systemAdmin()
    {
        return $this->hasOne('Modules\Admin\Entities\SystemAdmin');
    }
    public function announcement()
    {
    	return $this->hasMany('Modules\Profile\Entities\Announcement');
    }
    
    public function profileAlbums()
    {
    	return $this->hasMany('Modules\Gallary\Entities\ProfileAlbum');
    }

    public function accessAlbums()
    {
    	return $this->hasMany('Modules\Gallary\Entities\AccessAlbum');
    }
    
    public function accesses()
    {
        return $this->hasMany('Modules\Profile\Entities\ProfileAccess');
    }

    public function religion()
    {
        return $this->belongsTo('Modules\Profile\Entities\Religion');
    }
    public function hospitalAdmissions()
    {
        return $this->hasMany('Modules\Health\Entities\HospitalAdmission');
    }
    public function events()
    {
    	return $this->hasMany('Modules\Event\Entities\Event');
    }

    public function death()
    {
        return $this->hasOne('Modules\Death\Entities\Death');
    }
    
    public function attendEvents()
    {
    	return $this->hasMany('Modules\Event\Entities\AttendEvent');
    }

    public function profileExpertices()
    {
        return $this->hasMany('Modules\Profile\Entities\ProfileExpertice');
    }

    public function profileExperiences()
    {
        return $this->hasMany('Modules\Profile\Entities\ProfileExperience');
    }

    public function userMessage()
    {
    	return $this->hasMany('Modules\Profile\Entities\UserMessage');
    }
    
    public function family()
    {
    	return $this->belongsTo('Modules\Family\Entities\Family');
    }
    public function leave()
    {
        return $this->hasOne('Modules\Address\Entities\LivesIn');
    }
    public function message()
    {
    	return $this->hasMany('Modules\Profile\Entities\Message');
    }

    public function userImage()
    {
    	return $this->hasOne('Modules\Profile\Entities\UserImage');
    }

    public function userVedio()
    {
    	return $this->hasOne('Modules\Profile\Entities\UserVedio');
    }

    public function wife()
    {
    	return $this->hasOne('Modules\Marriage\Entities\Wife');
    }
    
    public function husband()
    {
    	return $this->hasOne('Modules\Marriage\Entities\Husband');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function businessUndergoes()
    {
    	return $this->belongsToMany('Modules\Profile\Entities\BusinessUndergoes');
    }

    public function deseaseUndergoes()
    {
    	return $this->belongsToMany('Modules\Profile\Entities\DeseaseUndergoes');
    }

    public function gender()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Gender');
    }

    public function image()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Image');
    }

    public function life()
    {
    	return $this->belongsTo('Modules\Profile\Entities\LifeStatus');
    }

    public function maritalStatus()
    {
    	return $this->belongsTo('Modules\Profile\Entities\MaritalStatus');
    }

    public function contacts()
    {
    	return $this->hasMany('Modules\Profile\Entities\UserContact');
    }

    public function details()
    {
    	return $this->hasMany('Modules\Profile\Entities\UserDetail');
    }
    
    public function profileHealth()
    {
    	return $this->hasOne('Modules\Profile\Entities\ProfileHealth');
    }

    public function workHistories()
    {
    	return $this->hasMany('Modules\Profile\Entities\WorkHistory');
    }

    public function work()
    {
        return $this->hasOne('Modules\Address\Entities\WorkIn');
    }

    public function thisProfileFamilyId()
    {
    	$family = null;
    	if(is_null($this->family_id) && !is_null($this->wife)){
            foreach($this->wife->marriages as $marriage){
             	$family = $marriage->husband->profile->family_id;
            }
    	}else{
    		$family = $this->family_id;
    	}
    	return $family;
    }
    public function thisProfileFamily()
    {
        $family = null;
        if(is_null($this->family_id) && !is_null($this->wife)){
            foreach($this->wife->marriages as $marriage){
                $family = $marriage->husband->profile->family;
            }
        }else{
            $family = $this->family;
        }
        return $family;
    }
    public function profileImageLocation($flag)
    {
    	$location = null;
    	if($this->image_id > 2 || $flag == 'upload'){
            if($this->child != null && $this->gender_id == 1){
	            $location = $this->thisProfileFather()->family->location;
	    	}elseif($this->wife != null && $this->family_id === null){
	            foreach($this->wife->marriages as $marriage){
		           	if($marriage->is_active == 1){
	                    $location = $marriage->husband->profile->family->location;
		           	}
	            }
	    	}elseif($this->wife != null && !is_null($this->family_id)){
	    		$location = $this->family->location;
	    	}else{
	    		$location = $this->family->location;
	    	}
    	}

        if(is_null($location)){
            $path = "Nfamily/Profile/Images/";
        }else{
        	$path = "Nfamily/Profile/Images/".$location->town->district->lga->state->name.' State/'.$location->town->district->lga->name.' Local Government/'.$location->town->district->name.' District/'.$location->town->name.' Town/';
        }
        if($flag == 'display' && app()->environment()=='production'){
            return storage_url($path);
    	}else{
    		return $path;
    	}
    }

    public function certificateImageLocation()
    {
        
        $path = "Nfamily/Profile/Cerificates/".$this->id."/";
        
        if(app()->environment('production')){
            return storage_url($path);
        }else{
            return $path;
        }
    }
}