<?php

namespace Modules\Family\Services\Traits;

trait FamilyMembers
{
	
    public function unMarriedSons()
    {
        $sons = [];
        foreach ($this->familyAdmin->profile->husband->father->births as $birth) {
            $childProfile = $birth->child->profile;
            if($childProfile->gender->id == 1 && !$childProfile->husband && $childProfile->life_status_id == 1){
                $sons[] = $childprofile;
            }
        }
        return $sons;
    }

    public function unMarriedDaughters()
    {
        $doaghters = [];
        foreach ($this->familyAdmin->profile->husband->father->births as $birth) {
            $childProfile = $birth->child->profile;
            if($childProfile->gender->id == 2 && !$childProfile->husband && $childProfile->life_status_id == 1){
                $doaghters[] = $childprofile;
            }
        }
        return $doaghters;
    }

    public function availablePeopleInTheFamily($status)
	{

        $people = [];
        switch ($status) {

            case 'husband':
                if($this->familyAdmin->profile->life_status_id == 1){
                    $people[] = $this->familyAdmin->profile;
                }
                break;
                
            case 'wife':
                foreach($this->familyAdmin->profile->husband->marriages->where('is_active', 1) as $marriage){
                    if($marriage->wife->profile->life_status_id == 1){
                        $people[] = $marriage->wife->profile;
                    }
                }
                break;
                
            case 'child':
                if($this->familyAdmin->profile->isFather()){
                    foreach($this->familyAdmin->profile->husband->father->births as $birth){
                        if($birth->child->profile->life_status_id ==1){
                            $people[] = $birth->child->profile;
                        }
                    }
                }
                break;
                
            default:
                if($this->familyAdmin->profile->isFather()){
                    foreach($this->familyAdmin->profile->husband->father->births as $birth){
                        $profile = $birth->child->profile;
                        if($profile->life_status_id == 1 && $profile->gender_id == 2 && $profile->wife){
                            foreach ($profile->wife->marriages->where('is_active',1) as $marriages) {
                                if($marriage->husband->profile->life_status_id == 1 && $marriage->husband->profile->life_status_id == 1){
                                    $people[] = $marriage->husband->profile;
                                }
                            }
                        }	
                    }
                }
                break;
        }
        
        return $people;
	}
    
}