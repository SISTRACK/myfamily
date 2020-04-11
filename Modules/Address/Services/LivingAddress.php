<?php

namespace Modules\Address\Services;

use Modules\Address\Entities\Area;
use Modules\Address\Entities\House;

trait LivingAddress
{  

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
        $this->newHouse(Area::find($this->data['area']));
        return $this->newAddress($this->house);
    }

}