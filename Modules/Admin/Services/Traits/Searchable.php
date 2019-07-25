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
 			foreach($town->locations as $location){
 				foreach ($location->families as $family) {
 					foreach ($family->profiles as $profile) {
 						if($profile->user->first_name == $data['first_name'] && $profile->user->last_name == $data['last_name']){
 							$profiles[]= $profile;
 						}
 					}
 				}
 			}
 		}
		return $profiles;
    }
}