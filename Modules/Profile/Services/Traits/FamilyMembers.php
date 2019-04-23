<?php

namespace Modules\Profile\Services\Traits;
 
 
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
				    'image'=>$birth->child->profile->image->name
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
					    'status'=>$marriage->wife->status->name
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
					    'image'=>$marriage->husband->profile->image->name
            		];
            	}
            }
		}
		return $husband;
	}
}
