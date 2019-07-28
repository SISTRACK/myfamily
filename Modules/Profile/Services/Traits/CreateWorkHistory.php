<?php

namespace Modules\Profile\Services\Traits;
 
use Modules\Profile\Entities\Profile; 

 
trait 	CreateWorkHistory

{

	public function newWorkHistory()
	{
		if(admin()){
			$profile = Profile::find(request()->route('profile_id'));
		}else{
			$profile = Auth()->User()->profile;
		}
		$profile->workHistories()->create([
        'address_id' => $profile->leave->address_id,
        'date' => strtotime($this->data['work_history_date']),
        'history' => $this->data['history']
		]);
	}

	public function thisProfileWorkHistory()
	{
        $histories = [];
        foreach($this->workHistories as $history)
        {
        	$histories[] = ['history'=>$history->history, 'date'=>date('M:Y:D',$history->date), 'place'=>$this->getThisProfileOffice()];
        }
        return $histories;
	}

	protected function getThisProfileOffice()
	{
		if($this->work != null){
			return $this->work->address->office->company->name;
		}else{
            return 'Not Registered';
		}
	}
}
