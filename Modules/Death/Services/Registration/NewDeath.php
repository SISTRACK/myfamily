<?php

namespace Modules\Death\Services\Registration;

use App\User;

class NewDeath

{
	public $data;
    public $error = [];
	public function __construct($data)

	{
		$this->data = $data;
		$this->validate();
		$this->registerDeath();
	}

	protected function registerDeath()

	{
		if($this->error == null){
			$user = User::find($this->data['first_name']);
			switch (session('death')['status']) {
				case 'husband':
					if($user->profile->husband){
						foreach($user->profile->husband->marriages as $marriage){
							$marriage->update(['is_active'=> 0]);
						}
					}
					break;
				case 'wife':
					foreach($user->profile->wife->marriages as $marriage){
						$marriage->update(['is_active'=> 0]);
					}
					break;
					case 'child':
					if($user->profile->husband != null){
	                    foreach($user->profile->husband->marriages as $marriage){
							$marriage->update(['is_active'=> 0]);
						}
					}
					break;
				default:
					foreach($user->profile->wife->marriages as $marriage){
						$marriage->update(['is_active'=> 0]);
					}
					break;
			}
			$user->profile->death()->create([
				'date'=>strtotime($this->data['date']),
				'about_death'=>$this->data['about_death'],
				'place'=>$this->data['place'],
				'death_at'=>$this->data['death_at'],
				'user_id'=>Auth()->User()->id
			]);
			$user->profile->update([
				'life_status_id' => 0,
				'is_active'=>0
			]);
		}else{
			session()->flash('error',$this->error);
		}

	}

	protected function validate()
	{
		if(strtotime($this->data['date']) > time()){
			$this->error[] = "Sorry you cannot use data ahead of today's date to register death";
		}
	}
	
}