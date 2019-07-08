<?php

namespace Modules\Family\Services\Account;

use Modules\Family\Entities\Tribe;
use Modules\Address\Entities\Location;
use Modules\Address\Services\FamilyLocation;
use Modules\Family\Services\Account\Admin;


trait Family

{

	use Admin;

    public $location;

    public $family;

	public function registerFamily(){
		
        $this->newFamily($this->data['location']);
       
        $this->newAdminHandle();

        if(session('register')['status'] == 'son'){
            $this->createSubFamily();
        }

	}

    private function newFamily(Location $location){
        if(auth()->guard('family')->user()){
            $this->family = $location->families()->firstOrCreate([
            'name'=>$this->data['family'],
            'title' => $this->data['title'],
            'tribe_id'=>$this->data['tribe'],
            'user_id'=>Auth()->User()->id,
            ]);
        }else{
            $this->family = $location->families()->firstOrCreate([
            'name'=>$this->data['family'],
            'title' => $this->data['title'],
            'tribe_id'=>$this->data['tribe'],
            'admin_id'=>admin()->id,
            ]);
        }
        

    }

    private function createSubFamily()
    {
    	$this->user->profile->child->birth->father->husband->profile->family->subFamilies()->create(['sub_family_id'=>$this->family->id]);
    }
}