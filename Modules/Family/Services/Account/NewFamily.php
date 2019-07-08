<?php

namespace Modules\Family\Services\Account;

use Modules\Family\Services\Account\Family;

use Modules\Address\Services\FamilyLocation;

use Modules\Family\Services\Account\Validate;

class NewFamily 
{
    use Validate;

	public $data;

    public $registerer;

    use Family, FamilyLocation;

    public function __construct($data)
    {
        $this->data = $data;
        $this->location();
        $this->data = $this->prepareData($data);
        if(auth()->guard('family')->user()){
            $this->registerer = Auth()->User();
        }else{
            $this->registerer = admin();
        }
        
        $this->validateFamilyRequest(); 
        $this->error == null ? $this->registerFamily() : session()->flash('error',$this->error);
    }

    private function prepareData($data)
    {
        $data['location'] = $this->location;
        if(!is_null(admin())){
            $data['mdate'] = null;
        }
        return $data;
    }

}