<?php
namespace Modules\Admin\Services\Traits;

trait Administration
{
	public function availableDistricts()
    {
        $districts = [];
        if(admin()->district){
            $districts[] = $district;
        }elseif (admin()->lga) {
            foreach (admin()->lga->districts as $district) {
                $districts[] = $district;
            }
        }elseif (admin()->state) {
            foreach (admin()->state->lgas as $lga) {
                foreach ($lga->districts as $district) {
                    $districts[] = $district;
                }
            }
        }
        return $districts;
    }
    public function availableHospitals()
    {
        $hospitals = [];
        if(admin()->district){
            foreach (admin()->district->towns as $town) {
            	foreach ($town->hospitalLocations as $hospital_location) {
            		$hospitals[] = $hospital_location->hospital;
            	}
            }
        }elseif (admin()->lga) {
            foreach (admin()->lga->districts as $district) {
                foreach ($district->towns as $town) {
                    foreach ($town->hospitalLocations as $hospital_location) {
	            		$hospitals[] = $hospital_location->hospital;
	            	}
                }
            }
        }elseif (admin()->state) {
            foreach (admin()->state->lgas as $lga) {
                foreach ($lga->districts as $district) {
                    foreach ($district->towns as $town) {
                        foreach ($town->hospitalLocations as $hospital_location) {
		            		$hospitals[] = $hospital_location->hospital;
		            	}
                    }
                }
            }
        }
        return $hospitals;
    }
    public function availableCourts()
    {
        $courts = [];
        if(admin()->district){
            foreach (admin()->district->towns as $town) {
            	foreach ($town->courtLocations as $court_location) {
            		$courts[] = $court_location->court;
            	}
            }
        }elseif (admin()->lga) {
            foreach (admin()->lga->districts as $district) {
                foreach ($district->towns as $town) {
                    foreach ($town->courtLocations as $court_location) {
	            		$courts[] = $court_location->court;
	            	}
                }
            }
        }elseif (admin()->state) {
            foreach (admin()->state->lgas as $lga) {
                foreach ($lga->districts as $district) {
                    foreach ($district->towns as $town) {
                        foreach ($town->courtLocations as $court_location) {
		            		$courts[] = $court_location->court;
		            	}
                    }
                }
            }
        }
        return $courts;
    }
    public function availablePoliceStations()
    {
        $policeStations = [];
        if(admin()->district){
            foreach (admin()->district->towns as $town) {
                foreach ($town->policeStationLocations as $location) {
                    $policeStations[] = $location->policeStation;
                }
            }
        }elseif (admin()->lga) {
            foreach (admin()->lga->districts as $district) {
                foreach ($district->towns as $town) {
                    foreach ($town->policeStationLocations as $location) {
                        $policeStations[] = $location->policeStation;
                    }
                }
            }
        }elseif (admin()->state) {
            foreach (admin()->state->lgas as $lga) {
                foreach ($lga->districts as $district) {
                    foreach ($district->towns as $town) {
                        foreach ($town->policeStationLocations as $location) {
                            $policeStations[] = $location->policeStation;
                        }
                    }
                }
            }
        }
        return $policeStations;
    }
    public function getThisAdminState()
    {
        if(admin()->district){
            return admin()->district->lga->state;
        }elseif (admin()->lga) {
            return admin()->lga->state;
        }elseif (admin()->state) {
            return admin()->state;
        }
    }
}