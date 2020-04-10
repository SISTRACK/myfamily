<?php

namespace Modules\Address\Services;

use Modules\Address\Services\BasAddress;

use Modules\Address\Entities\Area;

trait FamilyLocation
{
   
    use BaseAddress;

    public $location;

    public function location(){
     
        $this->newLocation(Area::find($this->data['area']));
          
    }

    public function newLocation(Area $area)
    {
        $this->location = $area->locations()->firstOrCreate([]);
    }
}