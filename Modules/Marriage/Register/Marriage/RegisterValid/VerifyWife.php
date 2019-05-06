<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\VerifyHusband;
use App\User;

trait VerifyWife
{
    

   
    public function birthAuth(User $user)
    {
        if(filled($user->profile->child->birth)){
            return true;
        }else{
            $this->error[] = "Sorry the wife birth authentication fails base on the specify email no birth";
        }
    }

    public function marriageAuth(User $user)
    {

        if($user->profile->date_of_birth < 378432000){
            $this->error = "Sorry the wife marriage authentication fails the owner of this email was too young to marry";
        }else if($user->profile->wife != null){
            foreach($user->profile->wife->marriages as $marriage){
                if($marriage->is_active == 1){
                    $this->error[] = "Sorry the wife marriage authentication fails the owner of this email was already married";
                }
            } 
        }
    }

    public function genderAuth(User $user)
    {
        if($user->profile->gender_id == 1){
            $this->error[] = "Sorry the wife gender authentication fails this email is belongs to male";
        }
    }

    public function wifeMarriageDateAuth()
    {
        if(strtotime($this->data['marriage_date']) - strtotime($this->data['wife_date']) < 378432000){
            $this->error[] = "Sorry the wife marriage date authentication fails there must be the interval of atleast 12 years between wife date of birth and marriage date";
        }
    }
}