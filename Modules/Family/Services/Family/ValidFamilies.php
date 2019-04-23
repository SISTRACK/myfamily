<?php

namespace Modules\Family\Services\Family;

use Modules\Family\Entities\Family;
use Modules\Family\Entities\SubFamily;

class ValidFamilies
{   
	protected $user;

    protected $my_family;

    protected $my_father_family;

    protected $my_grand_father_family;

	public $families = [];

	public function __construct(){

        $this->user = Auth()->User();
        $this->getAllFamilies();

	}
    
    protected function getAllFamilies()
    {
        $this->myFamily();
        // if($this->my_family != null && $this->hasSubFamily($this->my_family)){
        //     $this->mySonFamilies();
        // }

        // if($this->my_family != null && $this->hasMarriedDoughters($this->my_family)){
        // 	$this->myDaughterFamilies();
        // }
        
        // if($this->my_family != null && $this->hasHeadFamily($this->my_family)){
        // 	$this->myFatherFamily();
        // 	$this->myBrotherFamilies();
        // }

        // if($this->my_father_family != null && $this->hasMarriedDoughters($this->my_father_family)){
        // 	$this->mySisterFamilies();
        // }

        // if($this->my_father_family != null && $this->hasHeadFamily($this->my_father_family)){
        //     $this->myGrandFatherFamily();
        //     $this->myFatherBrotherFamilies();
        // }

    }
    private function hasSubFamily(Family $family)
    {
        if($family->subFamily != null){
        	return true;
        }
    }

    private function hasMarriedDoughters(Family $family)
    {
        $flag = false;
        foreach($family->profiles as $profile){
        	if($profile->wife != null && $profile->wife->marriage->is_active == 1){
        		$flag = true;
        	}
        }
        return $flag;
    }

    private function hasHeadFamily(Family $family)
    {
        if(SubFamily::where('sub_family_id',$family->id)->get() != null){
        	return true;
        }
    }
    private function mySisterFamilies()
    {
        $father = $this->myFatherFamily->admin->profile->husband->father;
        foreach($father->births as $birth){
            $profile = $birth->child->profile;
            if($profile->gender_id == 2){
            	if($profile->wife != null && $profile->wife->marriage->is_active == 1){
            		$husband = $profile->wife->marriage->husband;
            	    $faimilies[] = $husband->profile->admin->family;
            	}
            }
        }
    }
    private function myDaughterFamilies()
    {
        $father = $this->myFamily->admin->profile->husband->father;
        foreach($father->births as $birth){
            $profile = $birth->child->profile;
            if($profile->gender_id == 2){
            	if($profile->wife != null && $profile->wife->marriage->is_active == 1){
            		$husband = $profile->wife->marriage->husband;
            	    $faimilies[] = $husband->profile->admin->family;
            	}
            }
        }
    }
	private function myFamily()
	{
		$family = Family::find($this->user->profile->family_id);
        $this->families[] = $family;
        $this->my_family = $family;
	}

	private function myFatherFamily()
	{
        $family = Family::find(SubFamily::where('sub_family_id',$this->my_family->id)->family_id->get());
        $this->my_father_family = $family;
        $this->families[] = $family;
	}

    private function myFatherBrotherFamilies()
	{
        foreach(SubFamily::where('family_id',$this->myGrangFatherFamily->id)->get() as $family){
        	if($family->sub_family_id != $this->my_father_family->id){
        		$this->families[] = Family::find($family->sub_family_id);
        	}
        }
	}
   
	private function myGrandfatherFamily()
	{
        $family = Family::find(SubFamily::where('sub_family_id',$this->my_father_family->id)->family_id->get());
        $this->my_grand_father_family = $family;
        $this->families[] = $family;
	}

	private function myBrotherFamilies()
	{
        foreach(SubFamily::where('family_id',$this->my_father_family->id)->get() as $family){
        	if($family->sub_family_id != $my_family->id){
        		$this->families[] = Family::find($family->sub_family_id);
        	}
        }
	}

	private function mySonFamilies()
	{
        foreach(SubFamily::where('family_id',$this->my_family->id)->get() as $family){
        	$this->families[] = Family::find($family->sub_family_id);
        }
	}

}