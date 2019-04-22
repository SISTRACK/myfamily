<?php

namespace Modules\Profile\Services\Traits;
 
use Modules\Profile\Entities\Experience; 
 
trait Experiences

{
	public function currentProfileExperience()
	{
		$expe = [];
		foreach($this->profileExperiences as $experience){
			$expe[] = [
				'name'=>$experience->experience->name,
				'about'=>$experience->about,
				'from'    => $experience->from,
				'to'      => $experience->to,
				'address' => $experience->address,
			];
		}
		return $expe;
	}

	public function newExperience()
	{
        $experience = Experience::firstOrCreate(['name'=>$this->data['experience']]);
        $expertice->profileExperience()->create([
        	'profile_id'=>Auth()->User()->profile->id,
        	'about'=>$this->data['about_experience'],
        	'from' => strtotime($this->data['from']),
        	'to' => strtotime($this->data['to']),
        	'address' => $this->data['address']
        ]);
	}
}
