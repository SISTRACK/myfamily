<?php

namespace Modules\Address\Services;

use Modules\Address\Services\BasAddress;

use Modules\Address\Entities\Area;

trait FamilyLocation
{
   
    use BaseAddress;

    public $location;

    public function location(){
    
        $this->newCountry();
        $this->newState($this->country);
        $this->newLga($this->state);
        $this->newDistrict($this->lga);
        $this->newTown($this->lga);
        $this->newArea($this->town);
        $this->newLocation($this->area);
          
    }

    public function newLocation(Area $area)
    {
        $this->location = $area->locations()->firstOrCreate([]);
    }
}