<?php

namespace Modules\Event\Services\Registration;

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

    use ValidateEvent, NewEvent;

	function __construct($data)
	{
		$this->profile = Auth()->User()->profile;
		$this->family = $this->profile->family;
		$this->data = $data;
		$this->validateEvent();
		$this->registerThisEvent()
	}
}