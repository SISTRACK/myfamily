<?php

namespace Modules\Family\Services\Account;

use Illuminate\Support\Facades\Hash;

use Modules\Profile\Entities\Profile;

use Modules\Family\Entities\Family;

use App\User;

trait Admin 

{

	public $admin;

    public $profile;

    public $user;

	public function newAdmin(Profile $profile, Family $family){

    	$this->admin = $family->familyAdmin()->create(['profile_id'=>$this->profile->id]);
        $profile->update(['family_id'=>$family->id]);

    }

    public function newUser()
    {
        if(session('register') == null){
        	if(empty($this->data['date'])){
	            $this->user = $this->registerer;
	        }else{
	            $this->user = User::firstOrCreate([
	                'first_name'=>$this->data['name'],
	                'last_name'=>$this->data['sname'],
	                'email'=>$this->data['email'],
	                'password'=>Hash::make($this->data['password']),
	                'phone'=>'',
	            ]); 
	        }
        }elseif(session('register')['status'] == 'son'){
        	$this->user = $this->husbandUser;
        }else{
        	$this->user = User::firstOrCreate([
        		'first_name'=>$this->data['husband_first_name'],
        		'last_name'=>$this->data['husband_last_name'], 
        		'email'=>$this->data['new_husband_email']
        	]);
        }
    }
   
    public function newProfile(User $user)
    {
 
        if(session('register') == null){
	        if(!admin() && empty($this->data['date'])){
	            $this->data['date'] = $this->data['mdate'];
	        }
	    	$this->profile = $user->profile()->create([
                'image_id'=>1,
	            'gender_id'         => 1,
	            'marital_status_id' => 1,
	            'date_of_birth' => strtotime($this->data['date']),
	            'family_id' =>$this->family->id
	        ]);
        }elseif(session('register')['status'] == 'daughter' && $this->husbandUser->isNotEmpty()){
            $this->profile = $this->husbandUser->profile;
        }elseif(session('register')['status'] == 'son' && $this->husbandUser != null){
            $this->profile = $this->husbandUser->profile;
        }else{
        	$this->husbandUser = $this->user;
            $this->profile = $this->user->profile()->create(['image_id'=>1,'gender_id'=>1,'marital_status_id'=>2,'date_of_birth'=>strtotime($this->data['husband_date'])]);
            $this->husbandProfile = $this->profile;
		}
        
    }

    public function newAdminHandle()
    {   
    	$this->newUser();
        $this->newProfile($this->user);
        $this->newAdmin($this->profile, $this->family);
    }
}