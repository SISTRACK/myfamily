<?php

namespace Modules\Profile\Services\Traits;

trait Address

{
	public function address()
	{
		
		if ($this->leave != null){
			$address = $this->leave->address;
			$user_address = [
	            'country' => $address->house->area->town->district->lga->state->country->name,
	            'state' => $address->house->area->town->district->lga->state->name,
	            'lga' => $address->house->area->town->district->lga->name,
	            'district' => $address->house->area->town->district->name,
	            'town' => $address->house->area->town->name,
	            'area' => $address->house->area->name,
	            'house_no' => $address->house->house_no,
	            'house_description' => $address->house->house_desc,
	        ];
		}else{
			$address = $this->family->location;
			$user_address = [
	            'country' => $address->town->district->lga->state->country->name,
	            'state' => $address->town->district->lga->state->name,
	            'lga' => $address->town->district->lga->name,
	            'district' => $address->town->district->name,
	            'town' => $address->town->name,
	            'area' => '',
	            'house_no' => '',
	            'house_description' => '',
	        ];
		}
		return $user_address;
	}
}