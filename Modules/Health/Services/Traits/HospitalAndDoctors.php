<?php
namespace Modules\Health\Services\Traits;

use Illuminate\Http\Request;
use Modules\Address\Entities\Town;
use Modules\Health\Entities\HospitalType;
use Modules\Health\Entities\Doctor;
use Modules\Profile\Entities\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Services\Traits\Administration;
use Modules\Health\Http\Requests\DoctorFormRequest;

trait HospitalAndDoctors

{
    use Administration;

    public function registerThisHospital(array $data)
    {
        $hospital_type = HospitalType::find($data['hospital_type_id']);
        $hospital = $hospital_type->hospitals()->firstOrCreate([
            'name' => $data['name'],
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
    
    public function updateThisDoctor(DoctorFormRequest $request, $id)
    {

        $doctor = Doctor::find($id);
        $data = $request->all();
        $errors = [];
        if(admin()){
            $data['role_id'] = 1;
            if($this->getThisAdminState()->id == $data['state_id']){
                $errors[] = 'The profile ID is required for this registration';
            }
        }else{
            $data['hospital_id'] = doctor()->hospital->id;
            $data['role_id'] = 2;
            if(doctor()->hospital->hospitalLocation->town->lga->state->id == $data['state_id']){
                $errors[] = 'The profile ID is required for this registration';
            }
        }
        if(empty($errors)){
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
            if(admin()){
                $doctor->hospital_department_id = $data['department_id'];
                $doctor->save();
            }
            if($data['password']){
                $doctor->update([
                    'password'=>Hash::make($data['password'])
                ]);
            }
            session()->flash('message','Doctor information updated successfully');
        }else{
            session()->flash('error',$errors);
        }
        return back();
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
    		if(admin()){
                $data['role_id'] = 1;
                if($this->getThisAdminState()->id == $data['state_id']){
                    $errors[] = 'The profile ID is required for this registration';
                }
            }else{
                $data['role_id'] = 2;
                $data['hospital_id'] = doctor()->hospital->id;
                if(doctor()->hospital->hospitalLocation->town->lga->state->id == $data['state_id']){
                    $errors[] = 'The profile ID is required for this registration';
                }
            }
    		
    		$data['profile_id'] = null;
    	}
    	if(!session('error')){
    		$doctor = Doctor::create([
                'role_id'=>$data['role_id'],
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
            if(doctor()){
                $doctor->hospital_department_id = $data['department_id'];
                $doctor->save();
            }
	    	session()->flash('message','The doctor account created successfully');
    	}
    }
}
