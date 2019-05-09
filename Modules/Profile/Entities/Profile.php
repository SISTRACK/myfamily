<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\Profile\Services\Traits\Expertices;

use Modules\Profile\Services\Traits\Experiences;

use Modules\Profile\Services\Traits\Health;

use Modules\Profile\Services\Traits\FamilyMembers;

use Modules\Profile\Services\Traits\CreateWorkHistory;

class Profile extends Model
{
    protected $guarded = [];

    use Expertices, CreateWorkHistory, Experiences, Health, FamilyMembers;

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
    	return $this->hasMany(Announcement::class);
    }

    public function profileAccessibleBy()
    {
        $array = [];
        foreach (ProfileAccess::where('access_to_id',$this->id)->get() as $access) {

            $array[] = $this->find($access->profile_id); 
        }
        return $array;
    }

    public function profileAccessibleTo()
    {
        $array = [];
        foreach ($this->accesses as $access) {
            $array[] = $this->find($access->access_to_id); 
        }
        return $array;
    }
    public function accesses()
    {
        return $this->hasMany(ProfileAccess::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
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
        return $this->hasMany(ProfileExpertice::class);
    }

    public function profileExperiences()
    {
        return $this->hasMany(ProfileExperience::class);
    }

    public function userMessage()
    {
    	return $this->hasMany(UserMessage::class);
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
    	return $this->hasMany(Message::class);
    }

    public function userImage()
    {
    	return $this->hasOne(UserImage::class);
    }

    public function userVedio()
    {
    	return $this->hasOne(UserVedio::class);
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
    	return $this->belongsToMany(BusinessUndergoes::class);
    }

    public function deseaseUndergoes()
    {
    	return $this->belongsToMany(DeseaseUndergoes::class);
    }

    public function gender()
    {
    	return $this->belongsTo(Gender::class);
    }

    public function image()
    {
    	return $this->belongsTo(Image::class);
    }

    public function life()
    {
    	return $this->belongsTo(LifeStatus::class);
    }

    public function maritalStatus()
    {
    	return $this->belongsTo(MaritalStatus::class);
    }

    public function contacts()
    {
    	return $this->hasMany(UserContact::class);
    }

    public function details()
    {
    	return $this->hasMany(UserDetail::class);
    }
    
    public function profileHealth()
    {
    	return $this->hasOne(ProfileHealth::class);
    }

    public function workHistories()
    {
    	return $this->hasMany(WorkHistory::class);
    }

    public function work()
    {
        return $this->hasOne('Modules\Address\Entities\WorkIn');
    }

    public function birth()
    {
        $count = [];
        
        if($this->gender->name = 'Male' && $this->husband != null && $this->husband->father != null){
            foreach ($this->husband->father->births as $birth) {
                $count[] = $birth;
            }
        }else{
            foreach ($this->wife->mother->births as $birth) {
                $count[] = $birth;
            }
        } 
        return $count;
    }

}
