<?php

namespace Modules\Profile\Services\Traits;
 
use Modules\Marriage\Entities\Marriage;

trait FamilyMembers

{
	
	public function parents()
	{
        $parents = [];
        if($this->child != null){
        	$father = $this->child->birth->father->husband->profile->user;
        	$parents[] = [
        		'name'=>$father->first_name.' '.$father->last_name, 
        		'email'=>$father->email,
        		'user'=>$father,
        		'status'=>'Father',
        		'image'=> $father->profile->profileImageLocation('display').$father->profile->image->name
        	]; 
        	$mother = $this->child->birth->mother->wife->profile->user;
        	$parents[] = [
        		'name'=>$mother->first_name.' '.$mother->last_name, 
        		'email'=>$mother->email,
        		'user'=>$mother,
        		'status'=>'Mother',
        		'image'=> $mother->profile->profileImageLocation('display').$mother->profile->image->name
        	];
        }
        return $parents;
	}

    public function children()
	{
		$children = [];
		if($this->isFather()){
			foreach ($this->husband->father->births as $birth) {
				$child = $birth->child->profile->user;
				$children[] = [
					'name'=> $child->first_name.' '.$child->last_name,
					'email'=>$birth->child->profile->user->email,
					'user'=>$birth->child->profile->user,
					'image'=> $birth->child->profile->profileImageLocation('display').$birth->child->profile->image->name,
				    'birth_date' => date('D/M/Y',$birth->child->birth->date)
			    ];
			}
		}else if($this->isMother()){
			foreach ($this->wife->mother->births as $birth) {
				$child = $birth->child->profile->user;
				$children[] = [
					'name'=> $child->first_name.' '.$child->last_name,
					'email'=>$birth->child->profile->user->email,
					'user'=>$birth->child->profile->user,
				    'image'=> $birth->child->profile->profileImageLocation('display').$birth->child->profile->image->name,
				    'birth_date' => date('D/M/Y',$birth->child->birth->date)
			    ];
			}
		} 
		return $children;
	}
	public function wives()
	{
		$wives = [];
        if($this->husband != null){
       	    foreach ($this->husband->marriages as $marriage) {
				if($marriage->is_active == 1){
					$wife = $marriage->wife->profile->user;
					$wives[] = [
						'name'=> $wife->first_name.' '.$wife->last_name,
					    'email'=>$wife->email,
					    'user'=>$wife,
					    'image'=> $marriage->wife->profile->profileImageLocation('display').$marriage->wife->profile->image->name,
					    'status'=>$marriage->wife->status->name,
					    'married_date' => date('D/M/Y',$marriage->date),
					    'birth_date' => date('D/M/Y',$this->getWifeDateOfBirth($marriage))
				    ];
				}
			}
        }
       return $wives; 
	}

	public function thisProfileHusband()
	{
		$husband = null;
		if($this->wife != null){
            foreach($this->wife->marriages as $marriage){
            	if($marriage->is_active == 1){
                    $currentHusband = $marriage->husband->profile->user;
            		$husband = [
                        'name'=> $currentHusband->first_name.' '.$currentHusband->last_name,
					    'email'=>$currentHusband->email,
					    'user'=>$currentHusband,
					    'image'=> $marriage->husband->profile->profileImageLocation('display').$marriage->husband->profile->image->name,
					    'married_date' => date('D/M/Y',$marriage->date)
            		];
            	}
            }
		}
		return $husband;
	}

	public function getWifeDateOfBirth(Marriage $marriage)
	{
		$date = null;
		if($marriage->wife->profile->date_of_birth != null){
			$date = $marriage->wife->profile->date_of_birth;
		}else{
			$date = $marriage->wife->profile->birth->date;
		}
        return $date;
	}
	
	public function numberOfWives()
	{
		$marriages = [];
		if($this->husband != null){
			foreach ($this->husband->marriages as $marriage) {
				if($marriage->is_active == 1){
					$marriages[] = $marriage;
				}
			}
		}
		return $marriages;
	}

	public function numberOfBirths()
	{
		$births = [];
		if($this->isFather()){
			foreach ($this->husband->father->births as $birth) {
			    $births[] = $birth;
			}
		}else if($this->isMother()){
            foreach ($this->wife->mother->births as $birth) {
			    $births[] = $birth;
			}
		}
		return $births;
	}
    public function numberOfLiveBirthsInTheFamily()
	{
		$births = [];
		if($this->isFather()){
			foreach ($this->husband->father->births as $birth) {
				if($birth->child->profile->life_status_id == 1){
                    $births[] = $birth;
				}
			}
		}else if($this->isMother()){
			foreach ($this->wife->marriages as $marriage) {
				foreach ($marriage->husband->father->births as $birth) {
					if($birth->child->profile->life_status_id == 1) {
	                    $births[] = $birth;
					}
				}
			}
		}
		return $births;
	}
	public function numberOfLiveBirths()
	{
		$births = [];
		if($this->isFather()){
			foreach ($this->husband->father->births as $birth) {
				if($birth->child->profile->life_status_id == 1){
                    $births[] = $birth;
				}
			}
		}else if($this->isMother()){
			foreach ($this->wife->mother->births as $birth) {
				if($birth->child->profile->life_status_id == 1){
                    $births[] = $birth;
				}
			}
		}
		return $births;
	}
    
    public function numberOfDivorces()
	{
		$marriages = [];
		if($this->husband != null){
			foreach ($this->husband->marriages as $marriage) {
				if($marriage->divorce != null){
                    $marriages[] = $marriage;
				}
			}
		}
		return $marriages;
	}

	public function numberOfMarriages()
	{
		$marriages = [];
		if($this->husband != null){
			foreach ($this->husband->marriages as $marriage) {
                $marriages[] = $marriage;
			}
		}else if($this->wife != null){
			foreach ($this->wife->marriages as $marriage) {
                $marriages[] = $marriage;
			}
		}
		return $marriages;
	}
    public function numberOfMarriedDaughters()
	{
		$births = [];
		if($this->isFather()){
			foreach ($this->husband->father->births as $birth) {
				if($birth->child->profile->wife != null){
					$births[] = $birth;
				}
			}
		}else if($this->isMother()){
			foreach ($this->wife->mother->births as $birth) {
				if($birth->child->profile->wife != null){
					$births[] = $birth;
				}
			}
		}
		return $births;
	}
	public function numberOfMarriedSons()
	{
		$births = [];
		if($this->isFather()){
			foreach ($this->husband->father->births as $birth) {
				if($birth->child->profile->husband != null){
					$births[] = $birth;
				}
			}
		}else if($this->isMother()){
			foreach ($this->wife->mother->births as $birth) {
				if($birth->child->profile->husband != null){
					$births[] = $birth;
				}
			}
		}
		return $births;
	}
	public function numberOfDeathBirths()
	{
		$births = [];
		if($this->isFather()){
			foreach ($this->husband->father->births as $birth) {
				if($birth->child->profile->life_status_id == 0){
                    $births[] = $birth;
				}
			}
		}else if($this->isMother()){
			foreach ($this->wife->mother->births as $birth) {
				if($birth->child->profile->life_status_id == 0){
                    $numberOfLiveBirths[] = $birth;
				}
			}
		}
		return $births;
	}

	public function totalFamilyMembers()
	{
		$users = [];
		if($this->admin != null && $this->husband == null){
			$users[] = $this->user;
		}
		if($this->husband != null){
            $users[] = $this->husband->profile->user;
		}elseif($this->wife != null){
			foreach($this->wife->marriages as $marriage){
				if($marriage->is_active == 1){
					$users[] = $marriage->husband->profile->user;
				}
			}
		}
		if(!is_null($this->wife)){
            foreach ($this->wife->marriages as $marriage) {
            	if($marriage->is_active == 1){
            		foreach ($marriage->husband->profile->numberOfWives() as $valid_wife) {
            			$users[] = $valid_wife->wife->profile->user;
            		}
            	}
            }
		}else{
			foreach ($this->numberOfWives() as $marriage) {
				$users[] = $marriage->wife->profile->user;
			}
		}
		
		foreach ($this->numberOfLiveBirthsInTheFamily() as $birth) {
			$users[] = $birth->child->profile->user;
		}

		return  $users;
		
		
	}
    public function isFather()
    {
    	if($this->husband != null && $this->husband->father != null)
    		return true;
    	else
    		return false;

    }

    public function isMother()
    {
    	if($this->wife != null && $this->wife->mother != null)
    		return true;
    	else
    		return false;

    }

}
