<?php
trait HasIdentificationNumber

{
	public function identificationNo()
	{
		return $this->state->id.
		       $this->lga->id.
		       $this->district->id.
		       $this->town->id.
		       $this->area->id.
		       $this->family->id.
		       $this->profile->id
	}

	public function ($code)
	{
		
	}
}
