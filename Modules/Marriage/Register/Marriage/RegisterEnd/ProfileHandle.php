<?php

namespace Modules\Marriage\Register\Marriage\RegisterEnd;
use Illuminate\Support\Facades\Hash;
use App\User;

trait ProfileHandle
{
    
    public $husbandProfile;
    
    public $wifeProfile;

	public function handleWifeProfile()
	{
		if(request()->route('status') == 'daughter'){
            $user = User::find($this->data['wife_first_name']);
            $this->wifeUser = $user;
            $this->wifeProfile = $user->profile;
		}else{
			if(empty($this->data['wife_family'])){
	            $user= User::create(['first_name'=>$this->data['wife_first_name'],'last_name'=>$this->data['wife_last_name'],'password'=>Hash::make('123456')]);
	            $user->email = $user->first_name.$user->id.'@family.com';
		        $user->save(); 

	            $this->wifeProfile = $user->profile()->create(['image_id'=>2,'gender_id'=>2,'marital_status_id'=>2,'date_of_birth'=>strtotime($this->data['wife_date'])]);
			}else{
	            $user = User::where('email',$this->data['wife_email'])->get();
	            $this->wifeProfile = $user->profile;
			}
		}
		
	}
    public function createHusbandProfile()
	{

        $user= User::create(['first_name'=>$this->data['husband_first_name'],
        'last_name'=>$this->data['husband_last_name'],
        'email'=>$this->data['husband_email'],
        'password' => Hash::make('123456')]);
        $this->husbandProfile = $user->profile()->create(['image_id'=>1,'gender_id'=>1,'marital_status_id'=>2,'date_of_birth'=>strtotime($this->data['husband_date'])]);
		
	}
    public function handleHusbandProfile()
	{
		if(request()->route('status') == 'father' || request()->route('status') == 'son'){
			
			$this->husbandProfile = $this->husbandUser->profile;
		}else{
			if($this->husbandUser == null){
			    $this->husbandProfile = $this->husbandUser->profile;
			}else{
                $this->husbandProfile = $this->husbandUser->profile()->create(['gender_id'=>1,'marital_status_id'=>2,'date_of_birth'=>strtotime($this->data['husband_date'])]);
			}
        }

		if($this->husbandUser != null){
			$this->husbandProfile = $this->husbandUser->profile;
		}else{
			$this->husbandProfile = $this->createHusbandProfile();

		}
		$this->updateHusbandProfile();

	}

	public function updateHusbandProfile()
	{
        
		if($this->husbandProfile->marital_status_id != 2){
			$this->husbandProfile->update(['marital_status_id'=>2]);
		}
	}

	public function handle()
	{
		
        $this->handleHusbandProfile();
        $this->handleWifeProfile();
	}

}