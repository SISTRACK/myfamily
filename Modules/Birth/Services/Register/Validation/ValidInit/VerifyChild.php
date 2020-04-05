<?php

namespace Modules\Birth\Services\Register\Validation\ValidInit;

use App\User;
use Illuminate\Support\Facades\Hash;
use Modules\Profile\Entities\Desease;
use Modules\Government\Events\CountProfileInTheStatePopulation;

trait VerifyChild

{
	private $user;

	private $profile;

    private $health;

	public $child;

	public function createUser()
	{
		$this->user = User::create([
			'first_name'=>$this->data['child_name'],
			'last_name'=>$this->data['father_first_name'],
			'password'=>Hash::make('123456')
			]);
		$this->user->email = $this->user->first_name.$this->user->id.'@family.com';
		$this->user->save(); 
	}

	public function childProfile()
	{
		if($this->data['gender'] == 1){
			$image_id = 1;
		}else if($this->data['gender'] == 2){
			$image_id = 2;
		}
		if(admin()){
			$family_id = session('family')->id;
		}else{
			$family_id = session('family')['family'];
		}

		$this->profile = $this->user->profile()->create([
			'image_id'=>$image_id,
			'gender_id'=>$this->data['gender'],
			'family_id'=>$family_id,
			'marital_status_id'=>1,
			'date_of_birth'=>strtotime($this->data['date'])
			]);
		$familyProfileCount = $this->profile->family->familyProfileCounts->last();
		$this->profile->family->familyProfileCounts()
		->create([
			'profile_id'=>$this->wife->profile->id, 
			'count'=>$familyProfileCount->count += 1
			]);
		
		event(new CountProfileInTheStatePopulation($this->profile));
	}

	public function createChild()
	{
        $this->child = $this->profile->child()->firstOrCreate([]);
	}

	public function createHealth()
	{
		$this->health = Desease::firstOrCreate(['name'=>$this->data['health_status']]);
	}
    
    public function profileHealth()
    {
    	$this->createHealth();
    	$this->profile->profileHealth()->firstOrCreate(['desease_id'=>$this->health->id]);
    }
	public function handleChildProfile()
	{
		$this->createUser();
		$this->childProfile();
		$this->profileHealth();
		$this->createChild();
	}
}