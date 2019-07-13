<?php

namespace Modules\Family\Services\Family;

use Modules\Family\Entities\Family;

class ValidDeathNames

{
	protected $family;

    public $names;

	public function __construct()
	{
		$this->family = Family::find(session('death')['family']);
		$this->getAllNames();
	}

	protected function getAllNames()
	{

		$names = [];

		if(session('death')){
	        switch (session('death')['status']) {
				case 'husband':
				    $user = $this->family->familyAdmin->profile->user;
				    if(admin()){
                        if($user->profile->life_status_id != 0){
	                    	$names[] = [
	                            'first_name' => $user->first_name,
	                            'last_name' => $user->last_name,
	                            'user_id' => $user->id
	                    	];
	                    }
                	}else{
                		if(Auth()->User()->id != $user->id && $user->profile->life_status_id != 0){
	                    	$names[] = [
	                            'first_name' => $user->first_name,
	                            'last_name' => $user->last_name,
	                            'user_id' => $user->id
	                    	];
	                    }
                	}
				    
				    $this->names = $names;
					break;
				
				case 'wife':
					foreach($this->family->familyAdmin->profile->husband->marriages as $marriage){
	                    if($marriage->is_active == 1){
	                    	$wife = $marriage->wife->profile->user;
	                    	if(admin()){
                                if($wife->profile->life_status_id != 0){
			                    	$names[] = [
			                            'first_name' => $wife->first_name,
			                            'last_name' => $wife->last_name,
			                            'user_id' => $wife->id
			                    	];
			                    }
	                    	}else{
	                    		if(Auth()->User()->id != $wife->id && $wife->profile->life_status_id != 0){
			                    	$names[] = [
			                            'first_name' => $wife->first_name,
			                            'last_name' => $wife->last_name,
			                            'user_id' => $wife->id
			                    	];
			                    }
	                    	}
	                    }
					}
				    $this->names = $names;

					break;
				
				case 'child':
					foreach($this->family->familyAdmin->profile->husband->father->births as $birth){
	                	$profile = $birth->child->profile;
	                	if($profile->life_status_id ==1){
	                		if(admin()){
		                    	$names[] = [
		                            'first_name' => $profile->user->first_name,
		                            'last_name' => $profile->user->last_name,
		                            'user_id' => $profile->user->id
		                    	];			                   
	                    	}else{
	                    		if(Auth()->User()->id != $id){
			                    	$names[] = [
			                            'first_name' => $profile->user->first_name,
			                            'last_name' => $profile->user->last_name,
			                            'user_id' => $profile->user->id
			                    	];
			                    }
	                    	}
	                	}	
					}
				    $this->names = $names;
					break;
				default:
					foreach($this->family->familyAdmin->profile->husband->father->births as $birth){
	                	$profile = $birth->child->profile;
	                	if($profile->life_status_id == 1 && $profile->gender_id == 2 && $profile->wife){
	                		foreach ($profile->wife->marriages as $marriages) {
	                			if($marriage->is_active == 1 && $marriage->husband->profile->life_status_id != 0){
	                				$husband = $marriage->husband->profile->user;
	                				if(admin()){
				                    	$names[] = [
				                            'first_name' => $husband->first_name,
				                            'last_name' => $husband->last_name,
				                            'user_id' => $husband->id
				                    	];			                   
			                    	}else{
		                				if(Auth()->User()->id != $husband->id){
		                					$names[] = [
					                            'first_name' => $husband->first_name,
					                            'last_name' => $husband->last_name,
					                            'user_id' => $husband->id
					                    	];
		                				}
		                			}
	                			}
	                		}
	                	}	
					}
					break;
			}
		}else{
			$this->names = $names;
		}
		
	}
}