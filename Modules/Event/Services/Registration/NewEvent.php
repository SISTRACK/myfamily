<?php

namespace Modules\Event\Services\Registration;

trait NewEvent
{
	protected function newEvent()
	{
		$this->event = $this->profile->events()->create([
            'date'           => strtotime($this->data->date),
            'description'    => $this->data->message,
            'start_time'     =>    strtotime($this->data->start),
            'end_time'       =>    strtotime($this->data->end),
            'type'           =>     $this->data->type,
            'address'        =>     $this->data->address,
		])
	}

	protected function familyEvent()
	{
		$this->event->familyEvent()->firstOrCreate(['family_id'=> new RootFamily($this->family)->id]);
	}

	protected registerThisEvent()
	{ 
		if(session('error') == null){
			$this->NewEvent();
            $this->familyEvent();
		}
	}
}