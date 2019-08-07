<?php
namespace Modules\Health\Services\Traits;

use Illuminate\Http\Request;
use Modules\Address\Entities\Town;
use Modules\Health\Entities\Doctor;
use Modules\Profile\Entities\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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

    public function newHospitalRegistrationDistricts()
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
            foreach (admin()->state->lgas as $lga) {
                foreach ($lga->districts as $district) {
                    foreach ($district->hospitals as $hospital) {
                        $hospitals[] = $hospital;
                    }
                }
            }
        }
        return $hospitals;
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
    public function updateThisDoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $data = $request->all();
        $doctor->update([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'gender_id'=>$data['gender_id'],
            'discpline_id'=>$data['discpline_id'],
            'profile_id'=>$data['profile_id'],
            'hospital_id'=>$data['hospital_id']
        ]);
        if($data['password']){
            $doctor->update([
                'password'=>Hash::make($data['password'])
            ]);
        }
        session()->flash('message','Doctor information updated successfully');
        return back();
    }
    protected function validateDoctor(array $data)
    {
        return Validator::make($data, [
            'gender_id' => 'required',
            'state_id' => 'required',
            'discpline_id' => 'required',
            'hospital_id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:doctors',
            'email' => 'required|string|email|max:255|unique:doctors',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    public function createDoctorAccount($data)
    {
    	$errors = [];
    	if($data['profile_id']){
            $profile = Profile::find($data['profile_id']);
            if(!$profile){
           	   $errors[] = 'Invalid Profile ID';
            }else{
            	if($data['first_name'] !=$profile->user->first_name){
	               $errors[] = 'Sorry the specify first name does not match the one on the specified profile';
	            }
	            if($data['last_name'] !=$profile->user->last_name){
	               $errors[] = 'Sorry the specify last name does not match the one on the specified profile';
	            }
	            if($data['gender_id'] !=$profile->user->gender_id){
	               $errors[] = 'Sorry the specify Gender does not match the one on the specified profile';
	            }
	            if(empty($errors)){
	            	$data['first_name'] = $profile->user->first_name;
		            $data['last_name'] = $profile->user->first_name;
		            $data['gender_id'] = $profile->gender_id;
	            }else{
	            	session()->flash('error',$errors);
	            }
            }
           
    	}else{
    		
    		if($this->getThisAdminState()->id == $data['state_id']){
    			$errors[] = 'The profile ID is required for this registration';
    		}
    		$data['profile_id'] = null;
    	}
    	if(!session('error')){
    		Doctor::create([
	    		'first_name'=>$data['first_name'],
	    		'last_name'=>$data['last_name'],
	    		'email'=>$data['email'],
	    		'password'=>Hash::make($data['password']),
	    		'phone'=>$data['phone'],
	    		'gender_id'=>$data['gender_id'],
	    		'discpline_id'=>$data['discpline_id'],
	    		'profile_id'=>$data['profile_id'],
                'hospital_id'=>$data['hospital_id'],
	    		'state_id'=>$data['state_id'],
	    	]);
	    	session()->flash('message','The doctor account created successfully');
    	}
    }
}
