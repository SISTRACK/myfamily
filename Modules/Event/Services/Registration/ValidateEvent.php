<?php
namespace Modules\Event\Services\Registration;

use Modules\Family\Services\Family\RootFamily;
use Modules\Event\Entities\Event;

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
        
  //       $event = Event::where([
  //       	'date'           => strtotime($this->data['date']),
  //           'start_time'     =>    strtotime($this->data['start']),
  //           'end_time'       =>    strtotime($this->data['end']),
  //           'type'           =>     $this->data['type'],
  //           'address'        =>     $this->data['address']
  //       ])->get();

  //       $root = new RootFamily($this->family);
        
		// if($event->familyEvent != null && $event->familyEvent->family_id == $root->id){
		// 	$error[] = 'Event Authentication fails : The same type of event has register at same address, date, start and end time';
		// }

		if(!empty($error)){
			session()->flash('error',$error);
		}

	}
}