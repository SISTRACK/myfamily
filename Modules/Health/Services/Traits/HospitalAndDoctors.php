<?php
namespace Modules\Health\Services\Traits;

trait HospitalAndDoctors

{
    public function registerThisHospital(array $data)
    {
        $town = Town::find($data['town_id']);
        $hospital = $town->district->hospitals()->firstOrCreate([
            'name' => $data['name'],
            'hospital_type_id' => $data['hospital_type_id'],
            'hospital_category_id' => $data['hospital_category_id'],
        ]);
        $hospital->hospitalLocation()->firstOrCreate([
            'address' => $data['address'],
            'town_id' => $data['town_id'],
        ]);
        session()->flash('message','Hospital created successfully');
    }

    public function updateThisHospital($hospital,$data)
    {
        
        $hospital->update([
            'name' => $data['name'],
            'hospital_type_id' => $data['hospital_type_id'],
            'hospital_category_id' => $data['hospital_category_id'],
        ]);
        $hospital->hospitalLocation()->update([
            'address' => $data['address'],
            'town_id' => $data['town_id'],
        ]);
        session()->flash('message','Hospital information updated successfully');
    }

    public function newHospitalRegistrationTowns()
    {
        $towns = [];
        if(admin()->district){
            foreach (admin()->district->towns as $town) {
                $towns[] = $town;
            }
        }elseif (admin()->lga) {
            foreach (admin()->lga->districts as $district) {
                foreach ($district->towns as $town) {
                    $towns[] = $town;
                }
            }
        }elseif (admin()->state) {
            foreach (admin()->state->lga as $lga) {
                foreach ($lga->districts as $district) {
                    foreach ($district->towns as $town) {
                        $towns[] = $town;
                    }
                }
            }
        }
        return $towns;
    }
    public function availableHospitals()
    {
        $hospitals = [];
        if(admin()->district){
            foreach (admin()->district->hospitals as $hospital) {
                $hospitals[] = $hospital;
            }
        }elseif (admin()->lga) {
            foreach (admin()->lga->districts as $district) {
                foreach ($district->hospitals as $hospital) {
                    $hospitals[] = $hospital;
                }
            }
        }elseif (admin()->state) {
            foreach (admin()->state->lga as $lga) {
                foreach ($lga->districts as $district) {
                    foreach ($district->hospitals as $hospital) {
                        $hospitals[] = $hospital;
                    }
                }
            }
        }
        return $hospitals;
    }
    protected function validateDoctor(array $data)
    {
        return Validator::make($data, [
            'gender_id' => 'required',
            'discpline_id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:doctors',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    public function createDoctorAccount($data)
    {
    	Doctor::create($data);
    	session()->flash('message','The doctor account created successfully');
    }
}
