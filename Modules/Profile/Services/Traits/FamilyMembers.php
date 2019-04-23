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
        		'image'=> $father->user->image->name
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
		if($this->husband->father != null){
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
				$wife = $marriage->wife->profile->user;
				$wives[] = [
					'name'=> $wife->first_name.' '.$wife->last_name,
				    'email'=>$wife->email,
				    'image'=>$marriage->wife->profile->image->name,
				    'status'=>$marriage->wife->status->name
			    ];
			}
        }
       return $wives; 
	}
}
