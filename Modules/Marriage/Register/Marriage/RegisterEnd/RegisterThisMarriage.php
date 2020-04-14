<?php

namespace Modules\Marriage\Register\Marriage\RegisterEnd;

use Modules\Marriage\Register\Marriage\RegisterEnd\MarriageInitiate;

use Modules\Family\Entities\Family;

use Modules\Address\Entities\Address;

use Modules\Address\Services\LivingAddress;

use App\User;

trait RegisterThisMarriage
{
   
    use MarriageInitiate, LivingAddress;

    public function register()
    {
    
        $this->handle();
        $this->createHusband($this->husbandProfile);
        $this->createWife($this->wifeProfile);
        $this->createMarriage($this->husband);
        $this->marriageAddress();
    }

    public function prepareData($data)
    {
    
    	switch (request()->route('status')) {
    		case 'father':

    			//data was already prepared
                $family = Family::find(request()->route('familyId'));
                $this->family = $family;
    		    $data['address'] = $this->address($data);
    			break;

    		case 'son':
    		    //prepare family data
		        $data['address'] = $this->address($data);
		        $family = Family::find(request()->route('familyId'));
                $this->family = $family;
		        $user = User::find($data['husband_first_name']);
                $data['family'] = strtolower($family->name.'-'.$user->first_name.'-child-id-'.$user->profile->child->birth->id);
                $data['title'] = $data['family'];
                $data['husband_email'] = $user->email;
                $data['new_husband_email'] = '';
                $data['tribe'] = $family->tribe_id;
                $data['location'] = $this->getLocation(Address::find($data['address']));
                    
    			break;
    		case 'daughter':
    			//need to prepare the data
    		    $data['address'] = $this->address($data);
		        $family = Family::find(request()->route('familyId'));
		        $user = User::find($data['wife_first_name']);
                $data['wife_email'] = $user->email;
                $data['wife_family'] = $user->profile->family->name;
                $data['wife_date'] = date('Y-m-d',$user->profile->child->birth->date);
                $data['family'] = strtolower($family->name.'-'.$data['husband_first_name'].'-inlaw-'.$user->profile->child->birth->id);
                $data['title'] = $data['family'];
                $data['location'] = $this->getLocation(Address::find($data['address']));
    			break;
    		default:
    			# code...
    			break;
    	}
    	return $data;
   }

   public function getLocation(Address $address)
   {
   	   return $address->house->area->locations()->firstOrCreate([]);
   }
}