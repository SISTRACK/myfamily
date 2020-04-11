<?php

namespace Modules\Profile\Entities;

use Modules\Core\Entities\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Modules\Profile\Services\Traits\ProfileEloquentRelations;
use Modules\Profile\Services\Traits\HasIdentificationNumber as Identification;

class Profile extends BaseModel implements HasMedia
{

    use ProfileEloquentRelations, HasMediaTrait, Identification;

    public function birth()
    {
        $count = [];
        if($this->gender->name = 'Male' && $this->husband != null && $this->husband->father != null){
            if($this->isFather()){
                foreach ($this->husband->father->births as $birth) {
                    $count[] = $birth;
                }
            }
        }else{
            if($this->isMother()){
                foreach ($this->wife->mother->births as $birth) {
                    $count[] = $birth;
                }
            }
        } 
        return $count;
    }

    public function years()
    {
        $seconds = time() - $this->date_of_birth;
        return floor($seconds/31536000);
    }

    public function educationLevel()
    {
        $level = 'Zero Level';
        foreach($this->admitteds as $admission){
            $level = $admission->school->schoolType->name.' Level';
        }
        return $level;
    }

    public function healthStatus()
    {
        $status = 'Normal';
        foreach($this->hospitalAdmissions as $admission){
            if($admission->dischargeAdmission){
                $status = 'Dischrage from '.$admission->doctor->hospital->name;
            }else{
                $status = 'On Admission at'.$admission->doctor->hospital->name;
            }
        }
        return $status;
    }

    public function profileAccessibleBy()
    {
        $array = [];
        foreach (ProfileAccess::where(['access_to_id'=>$this->id,'is_active'=>1])->get() as $access) {

            $array[] = $this->find($access->profile_id); 
        }
        return $array;
    }

    public function profileAccessibleTo()
    {
        $array = [];
        foreach ($this->accesses as $access) {
            if($access->is_active == 1){
                 $array[] = $this->find($access->access_to_id); 
            }
        }
        return $array;
    }

    public function profilePicture()
    {
        if($this->image->id > 2){
            $picture = $this->image->name;
        }else{
            $picture = 'assets/images/users/'.strtolower($this->gender->name).'.jpg';
        }
        
        return $picture;
    }

}
