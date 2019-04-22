<?php

namespace Modules\Profile\Services\Traits;
 
use Modules\Profile\Entities\Expertice; 
 
trait Expertices

{
	public function currentProfileExpertice()
	{
		$expert = [];
		foreach($this->profileExpertices as $expertice){
			$expert[] = ['percentage'=>$expertice->percentage,'name'=>$expertice->expertice->name];
		}
		return $expert;
	}

	public function newExpertice()
	{
        $expertice = Expertice::firstOrCreate(['name'=>$this->data['expertice']]);
        $expertice->profileExpertice()->create(['profile_id'=>Auth()->User()->profile->id,'percentage'=> $this->data['percentage']]);
	}
}
