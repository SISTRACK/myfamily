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
        		'status'=>'Father',
        		'image'=> $father->profile->image->name
        	]; 
        	$mother = $this->child->birth->mother->wife->profile->user;
        	$parents[] = [
        		'name'=>$mother->first_name.' '.$mother->last_name, 
        		'email'=>$mother->email,
        		'status'=>'Mother',
        		'image'=>$mother->profile->image->name
        	];
        }
        return $parents;
	}

    public function children()
	{
		$children = [];
		if($this->husband != null && $this->husband->father != null){
			foreach ($this->husband->father->births as $birth) {
				$child = $birth->child->profile->user;
				$children[] = [
					'name'=> $child->first_name.' '.$child->last_name,
					'email'=>$birth->child->profile->user->email,
				    'image'=>$birth->child->profile->image->name,
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
					    'image'=>$marriage->wife->profile->image->name,
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
					    'image'=>$marriage->husband->profile->image->name,
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
	public function marriedDaughters()
	{
		$count = 0;
        if($this->husband != null && $this->husband->father != null){
        	foreach ($this->husband->father->births as $birth) {
        		if($birth->child->profile->wife != null){
        			$count ++ ;
        		}
        	}
        }
        return $count;
	}

	public function marriedSons()
	{
		$count = 0;
        if($this->husband != null && $this->husband->father != null){
        	foreach ($this->husband->father->births as $birth) {
        		if($birth->child->profile->husband != null){
        			$count ++ ;
        		}
        	}
        }
        return $count;
	}

	public function numberOfWives()
	{
		$count = 0;
		if($this->husband){
			foreach ($this->husband->marriages as $marriage) {
				if($marriage->is_active == 1){
					$count++;
				}
			}
		}
		return $count;
	}

	public function numberOfBirths()
	{
		$count = 0;
		if($this->husband){
			foreach ($this->husband->father->births as $birth) {
			    $count++;
			}
		}
		return $count;
	}

	public function numberOfLiveBirths()
	{
		$count = 0;
		if($this->husband){
			foreach ($this->husband->father->births as $birth) {
				if($birth->child->profile->life_status_id == 1){
                    $count++;
				}
			}
		}
		return $count;
	}

	public function numberOfDeathBirths()
	{
		$count = 0;
		if($this->husband){
			foreach ($this->husband->father->births as $birth) {
				if($birth->child->profile->life_status_id == 0){
                    $count++;
				}
			}
		}
		return $count;
	}
}
