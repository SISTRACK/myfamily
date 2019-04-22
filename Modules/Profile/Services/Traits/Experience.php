<?php

namespace Modules\Profile\Services\Traits;
 
use Modules\Profile\Entities\Experience; 
 
trait Experiences

{
	public function currentProfileExperience()
	{
		$expe = [];
		foreach($this->profileExperiences as $experience){
			$expe[] = ['name'=>$expertice->percentage,'about'=>$expertice->expertice->name];
		}
		return $expert;
	}

	public function newExperience()
	{
        $experience = Experience::firstOrCreate(['name'=>$this->data['expertice']]);
        $expertice->profileExperience()->create(['profile_id'=>Auth()->User()->profile->id,'about'=>$this->data['about_experience']]);
	}
}
