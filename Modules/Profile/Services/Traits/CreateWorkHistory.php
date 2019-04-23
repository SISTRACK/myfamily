<?php

namespace Modules\Profile\Services\Traits;
 

 
trait 	CreateWorkHistory

{

	public function newWorkHistory()
	{
		$user = Auth()->User();
		$user->profile->workHistories()->create([
        'address_id' => $user->profile->leave->address_id,
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
