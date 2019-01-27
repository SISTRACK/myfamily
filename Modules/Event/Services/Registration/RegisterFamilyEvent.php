<?php

/**
* this class will create new event to the authenticated user family root
*/
class RegisterFamilyEvent
{
	public $data;
    public $error;
    public $event;
    protected $profile;
    protected $family;
	function __construct($data)
	{
		$this->profile = Auth()->User()->profile;
		$this->family = $this->profile->family;
		$this->data = $data;
		$this->validateEvent();
		$this->registerThisEvent()
	}

	protected function validateEvent()
	{
		$error = [];
		if(strtotime($this->data['start']) <= time()){
			$error[] = 'Date Authentication fails : you are to late to register this event at this date';
		}

		if(!empty($error)){
			session()->flash('error',$error);
		}

	}

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