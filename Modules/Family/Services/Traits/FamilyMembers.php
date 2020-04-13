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
                $sons[] = $childProfile;
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
                $doaghters[] = $childProfile;
            }
        }
        return $doaghters;
    }

    
}