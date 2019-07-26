<?php

namespace Modules\Admin\Services\Traits;

trait Searchable

{
    public function getAvailableProfiles($data)
    {
    	$profiles = [];
     	if (admin()->state){

     		//get all users in the state
     		foreach (admin()->state->lgas as $lga) {
     			foreach($lga->districts as $district){
	     			foreach ($this->districtAvailableProfilesFound($district,$data) as $profile) {
		     			$profiles[] = $profile;
		     		}
	     		}
     		}
     	}elseif (admin()->lga) {
     		//get all the users in the lga
     		foreach(admin()->lga->districts as $district){
     			foreach ($this->districtAvailableProfilesFound($district,$data) as $profile) {
	     			$profiles[] = $profile;
	     		}
     		}
     	}elseif (admin()->district) {
     		# get all the users within the district
     		foreach ($this->districtAvailableProfilesFound(admin()->district,$data) as $profile) {
     			$profiles[] = $profile;
     		}
     	}
     	return $profiles;
    }

    public function districtAvailableProfilesFound($district,$data)
    {

    	$profiles = [];
    	foreach ($district->towns as $town) {
 			foreach($town->areas as $area){
 				foreach ($area->houses as $house) {
 					foreach ($house->address->leavesIn as $leave) {
 						similar_text($leave->profile->user->first_name,$data['first_name'], $like_name); 
 						similar_text($leave->profile->user->last_name,$data['last_name'], $like_sname);
 						if($like_name > 70 && $like_sname > 70){
							$profiles[] = $leave->profile;
						}
 					}	
 				}
 			}
 		}
        
		return $profiles;
    }
}