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
    
    public function userImages()
    {
    	return $this->hasMany('Modules\Gallary\Entities\UserImage');
    }
    
    public function userVedios()
    {
    	return $this->hasMany('Modules\Gallary\Entities\UserVedio');
    }

    public function accesses()
    {
        return $this->hasMany('Modules\Profile\Entities\ProfileAccess');
    }

    public function religion()
    {
        return $this->belongsTo('Modules\Profile\Entities\Religion');
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
}