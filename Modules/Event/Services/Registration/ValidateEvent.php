<?php
namespace Modules\Event\Services\Registration;

trait ValidateEvent

{
	protected function validateEvent()
	{
		$error = [];
		if(strtotime($this->data['date']) <= time()){
			$error[] = 'Date Authentication fails : you are to late to register this event at this start date';
		}
        if(strtotime($this->data['start']) >= strtotime($this->data['end'])){
			$error[] = 'Time Authentication fails : there must be an interval berween start time and end time of the event';
		}

		if(!empty($error)){
			session()->flash('error',$error);
		}

	}
}