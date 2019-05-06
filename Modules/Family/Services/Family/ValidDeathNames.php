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
				    $user = $this->family->admin->profile->user;
				    if(Auth()->User()->id != $user->id && $user->profile->life_status_id != 0){
						$names[] = [
							'first_name' => $user->first_name,
							'last_name' => $user->last_name,
							'user_id' => $user->id,
					    ];
				    }
				        $this->names = $names;
					break;
				
				case 'wife':
					foreach($this->family->admin->profile->husband->marriages as $marriage){
	                    if($marriage->is_active == 1){
	                    	$wife = $marriage->wife->profile->user;
	                    	if(Auth()->User()->id != $wife->id && $wife->profile->life_status_id != 0){
		                    	$names[] = [
		                            'first_name' => $wife->first_name,
		                            'last_name' => $wife->last_name,
		                            'user_id' => $wife->id
		                    	];
		                    }
	                    }
					}
				    $this->names = $names;

					break;
				
				case 'child':
					foreach($this->family->admin->profile->husband->father->births as $birth){
	                	$profile = $birth->child->profile;
	                	if($profile->life_status_id ==1){
	                		if(Auth()->User()->id != $profile->user->id && $profile->life_status_id != 0){
		                		$names[] = [
		                            'first_name' => $profile->user->first_name,
		                            'last_name' => $profile->user->last_name,
		                            'user_id' => $profile->user->id
		                    	];
	                        }
	                	}	
					}
				    $this->names = $names;
					break;
				
				default:
					foreach($this->family->admin->profile->husband->father->births as $birth){
	                	$profile = $birth->child->profile;
	                	if($profile->life_status_id == 1 && $profile->gender_id == 2 && $profile->wife != null){
	                		foreach ($profile->wife->marriages as $marriages) {
	                			if($marriage->is_active == 1){
	                				$husband = $marriage->husband->user;
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
					break;
			}
		}else{
			$this->names = $names;
		}
	}
}