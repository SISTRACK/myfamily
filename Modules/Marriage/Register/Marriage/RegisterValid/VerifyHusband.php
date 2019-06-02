<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use App\User;

use Modules\Marriage\Entities\Wife;

use Modules\Family\Entities\Family;

trait VerifyHusband
{
    

    public function married(User $user)
    {
        if(filled($user->profile->husband)){
           return true; 
        }
    }
    public function emailAuth()
    {
        if(empty($this->husbandUser)){
            $this->error[] = "Husband Email authentication fails it does not exist in our record";
        }elseif(empty($this->husbandUser->profile)){
            $this->error[] = "Husband Email authentication fails it does not belongs to any family member in our families record";
        }elseif($this->husbandUser->profile->gender_id == 2){
            $this->error[] = "Husband Email authentication fails this email belongs to female, you cannot use femail email";
        }
    }
    public function canMarry(User $user)
    {
        
        if(time() - $user->profile->data_of_birth < 567648000){
            return true;
        }else{
            $this->error[] = "marriage authentication fails too early to marry";
        }
    }

    public function canMarryAgain(User $user)
    {
        $wife = 0;
        foreach($user->profile->husband->marriages as $marriage){
            if($marriage->is_active == 1){
                $wife++;
            }
        }
        if($wife < 4){
            return true;
        }else{
            $this->error[] = "family authentication fails can not marry more than 4 wives";
        }
    }
    
    public function validBirth(User $user)
    {
        $flag = false;
        foreach(Family::find(session('register')['family'])->admin->profile->husband->marriages as $marriage){
            if($marriage->wife->mother->id == $user->profile->child->birth->mother_id){
                $flag = true;
            }
        }
        if($flag == false){
            $this->error[] = "husband birth authentication fails and his mother information";
        }
    }

    public function husbandMarriageDateAuth(User $user)
    {
       
        if(strtotime($this->data['marriage_date']) - strtotime($user->profile->date_of_birth) < 567648000){
            $this->error[] = "Sorry the husband marriage date authentication fails there must be the interval of atleast 15 years between husband date of birth and marriage date";
        }

        if(session('register')['status'] == 'son' && empty($this->husbandUser->email)){
            $this->error[] = "Profile authentication fails husband did not update his email to his profile";
        }
    }
}