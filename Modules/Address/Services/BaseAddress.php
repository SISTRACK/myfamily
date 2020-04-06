<?php

namespace Modules\Address\Services;

use Modules\Address\Entities\Country;
use Modules\Address\Entities\State;
use Modules\Address\Entities\Lga;
use Modules\Address\Entities\Town;


trait BaseAddress
{
	public $country;

    public function newCountry()
    {
    	$this->country = Country::firstOrCreate(['name'=>$this->data['country']]);
    }
    
    public $state;

    public function newState(Country $country)
    {
    	$this->state = $country->states()->firstOrCreate(['name'=>$this->data['state']]);
    }

    public $lga;

    public function newLga(State $state)
    {
    	$this->lga = $state->lgas()->firstOrCreate(['name'=>$this->data['lga']]);
    }

    public $district;
    
    public function newDistrict(Lga $lga)
    {
        $this->district = $this->lga->districts()->firstOrCreate(['name'=>$this->data['district']]);
    }

    public $town;

    public function newTown(Lga $lga)
    {
        $this->town = $lga->towns()->firstOrCreate(['district_id'=>$this->district->id,'name'=>$this->data['town']]);
    }

    public $area;

    public function newArea(Town $town)
    {
        $this->area = $town->areas()->firstOrCreate(['name'=>$this->data['area'],'code'=>$this->formatCode(count($town->areas)+1)]);
    }

    public function formatCode($code)
    {
        if($code < 10){
            $code = '0'.$code;
        }
        return $code;
    }
}