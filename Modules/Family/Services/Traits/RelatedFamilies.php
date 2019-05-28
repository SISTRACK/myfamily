<?php

namespace Modules\Family\Services\Traits;

trait RelatedFamilies
{
	
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
    public function root()
    {   
        $family = $this;
        while($family->getFamilyAheadOfThisFamily() != null){
            $family = $family->getFamilyAheadOfThisFamily();
        }
        return $family;
    }
    public function getHusbandFamilies()
    {
        $families = [];
        foreach($this->admin->profile->husband->father->births as $birth){
            if($birth->child->profile->gender->name == 'Female' && $birth->child->profile->wife != null){

                foreach ($birth->child->profile->wife->marriages as $marriage) {
                    if($marriage->is_active == 1){
                        $families[] = $marriage->husband->profile->family;
                    }
                }
            }
        }
        return $families;
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