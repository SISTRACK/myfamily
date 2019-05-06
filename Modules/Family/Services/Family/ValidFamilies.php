<?php

namespace Modules\Family\Services\Family;

use Modules\Family\Entities\Family;
use Modules\Family\Entities\SubFamily;

class ValidFamilies
{   
	protected $user;

    protected $my_family;

    protected $my_father_family;

    protected $my_children_families;

    protected $my_grand_father_family;

    protected $brother_families;

    protected $sister_husband_families;

	public $families;

	public function __construct(){
        $this->user = Auth()->User();
        $this->myFamily();
        $this->getAllFamilies();

	}
    
    protected function getAllFamilies()
    {
        $valid_families = [];
        $valid_families[] = $this->my_family;
        
        //check if you are achild and have a family get your father family and put in the array
        if($this->user->profile->child != null && $this->user->profile->husband != null){
            $father_family = $this->my_family->getFamilyAheadOfThisFamily();
            $this->my_father_family = $father_family;
            $valid_families[] = $this->my_father_family;
        }

        //get the families of your daughters husband families
        if($this->my_family->hasMarriedFemaleChild() == true){
            $this->sister_husband_families = $this->my_family->getHusbandFamilies();
            if(!empty($this->sister_husband_families)){
                foreach ($this->sister_husband_families as $sister_husband_family) {
                    $valid_families[] = $sister_husband_family;
                }
            }
        }
        
        //check if you have children that have families get their families and put them in the array
        if($this->my_family->hasMarriedMaleChild()){
            $this->my_children_families = $this->my_family->getFamiliesUnderThisFamily();
            foreach ($this->my_children_families as $family) {
                $valid_families[] = $family;
            }
        }
        //get the families of your sisters husband families
        if($this->my_father_family != null && $this->my_father_family->hasMarriedFemaleChild()){
            $this->sister_husband_families = $this->my_father_family->getHusbandFamilies();
            foreach ($this->sister_husband_families as $sister_husband_family) {
                $valid_families[] = $sister_husband_family;
            }
        }

        //check if your fathers children has families apart from you add them to the array
        if($this->my_father_family != null && $this->my_father_family->hasMarriedMaleChild()){
            $this->brother_families = $this->my_father_family->getFamiliesUnderThisFamily();
            foreach ($this->brother_families as $brother_family) {
                $valid_families[] = $brother_family;
            }
        }
        
        //if any of you brother's children has family out side add them to the array been them male or female
        if(!empty($this->brother_families)){
            foreach ($this->brother_families as $brother_family) {

                //put each of you brothers children family if any in the array

                if($brother_family->hasMarriedMaleChild()){
                    $brother_children_families = $brother_family->getFamiliesUnderThisFamily();
                    foreach ($brother_children_families as $brother_child_family) {
                        $valid_families[] = $brother_child_family;
                    }
                }

                //put each of you brothers children husband's family if any in the array

                if($brother_family->hasMarriedFemaleChild()){
                    $brother_children_families = $brother_family->getFamiliesUnderThisFamily();
                    foreach ($brother_children_families as $brother_child_family) {
                        $valid_families[] = $brother_child_family;
                    }
                }

            }
        }
        
        $this->families = $valid_families;
        
    }
    

	private function myFamily()
	{
        

        if($this->user->profile->wife != null){
            if($this->user->profile->family_id == null){
                foreach ($this->user->profile->wife->marriages as $marriage) {
                    if($marriage->is_active == 1 || $marriage->husband->profile->life_status_id == 0){
                        $family = $marriage->husband->profile->family;
                    }
                }
            }else{
                $family = $this->user->profile->family;
            }
        }else{
            $family = $this->user->profile->family;
        }
        $this->my_family = $family;

	}

	
    


	

}