<?php

namespace Modules\Address\Services;

use Modules\Address\Entities\Lga;

use Modules\Address\Entities\Town;

use Modules\Address\Entities\Area;

use Modules\Address\Entities\House;

use Modules\Address\Services\BaseAddress;

trait LivingAddress
{
 
    use BaseAddress;

    public $area;

    public function newArea(Town $town)
    {
       
    	$this->area = $town->areas()->firstOrCreate(['name'=>$this->data['area']]);
    }

    public $house;

    public function newHouse(Area $area)
    {
    	$this->house = $area->houses()->firstOrCreate([
    		'house_no'=>$this->data['house_no'],
    		'house_desc'=>$this->data['house_desc']
    	]);
    }

    public function newAddress(House $house)
    {
    	$address = $house->address()->firstOrCreate([]);
        return $address->id;
    }

    public function address()
    {
        $this->newCountry();
        $this->newState($this->country);
        $this->newLga($this->state);
        $this->newDistrict($this->lga);
        $this->newTown($this->lga);
        $this->newArea($this->town);
        $this->newHouse($this->area);
        return $this->newAddress($this->house);
    }

}