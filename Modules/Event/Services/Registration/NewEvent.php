<?php

namespace Modules\Event\Services\Registration;

use Modules\Family\Services\Family\RootFamily;

trait NewEvent
{
	protected function newEvent()
	{
		$this->event = $this->profile->events()->firstOrCreate([
            'date'           => strtotime($this->data['date']),
            'description'    => $this->data['message'],
            'start_time'     =>    strtotime($this->data['start']),
            'end_time'       =>    strtotime($this->data['end']),
            'type'           =>     $this->data['type'],
            'address'        =>     $this->data['address'],
		]);
	}

	protected function familyEvent()
	{
		$root = new RootFamily($this->family);
		$this->event->familyEvent()->create(['family_id'=> $root->family->id]);
	}

	protected function registerThisEvent()
	{ 
		if(session('error') == null){
			$this->NewEvent();
            $this->familyEvent();
            session()->flash('message','Event registered successfully');
		}
	}

}