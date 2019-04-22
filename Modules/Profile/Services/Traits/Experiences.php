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
				'from'    => date('D:M:Y',$experience->from),
				'to'      => date('D:M:Y',$experience->to),
				'address' => $experience->address,
				'duration'=> floor(($experience->to - $experience->from) / 2628002.88)
			];
		}
		return $expe;
	}

	public function newExperience()
	{
        $experience = Experience::firstOrCreate(['name'=>$this->data['experience']]);
        $experience->profileExperiences()->create([
        	'profile_id'=>Auth()->User()->profile->id,
        	'about'=>$this->data['about_experience'],
        	'from' => strtotime($this->data['from']),
        	'to' => strtotime($this->data['to']),
        	'address' => $this->data['address']
        ]);
	}
}
