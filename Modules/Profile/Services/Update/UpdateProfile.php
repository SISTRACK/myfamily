<?php

namespace Modules\Profile\Services\Update;

use Modules\Profile\Entities\Profile;
use Modules\Address\Services\WorkAddress;
use Modules\Education\Entities\Graduated;
use Modules\Profile\Services\Traits\Access;
use Modules\Address\Services\LivingAddress;
use Modules\Profile\Services\Traits\Health;
use Modules\Core\Services\Traits\UploadFile;
use Modules\Profile\Services\Traits\Expertices;
use Modules\Profile\Services\Traits\Experiences;
use Modules\Profile\Services\Traits\CreateWorkHistory;


/**
* this class will recieved the user information and update his profile
*/
class UpdateProfile
{
	public $data;

	protected $user;

	function __construct($data)
	{
		$this->data = $data;
		$this->user = $this->ValidUser();
		$this->update();
	}

    use WorkAddress, LivingAddress, Expertices, CreateWorkHistory, Experiences, Health, Access,UploadFile;

    protected function ValidUser()
    {
        if(auth()->guard('family')->check()){
            return Auth()->User();
        }
    	return Profile::find(request()->route('profile_id'))->user;
    }

	protected function update()
	{
		switch ($this->data['submit']) {
            case 'new_contact':
                # code...
                break;
            case 'change_profile_image':
                # code...
                break;
            case 'new_certificate':
                $graduation = Graduated::find($this->data['graduation_id']);
                $path = profile()->certificateImageLocation();
                $file = $this->storeFile($this->data['certificate'],$path);
                $graduation->update(['certificate'=>$file]);
                session()->flash('message','Congratulation your'.$graduation->admitted->school->schoolType->name.' certificate uploaded successfully');
                break;

            case 'new_health':
                $this->newHealth();
                session()->flash('message','The profile health information updated successfully');
                break;
            
            case 'new_expertice':
                $this->newExpertice();
                session()->flash('message','The profile expertice added successfully');
                break;

            case 'profile access':
                $this->newAccess();
                
                break;


            case 'new_experience':
                
                $this->newExperience();
                session()->flash('message','The profile experience added successfully');
                break;    
            
            case 'work_history':
                $this->newWorkHistory();
                session()->flash('message','The profile work history updated successfully');
                break;
            case 'new_business':
                # code...
                break;
            case 'business_address':
                if($this->user->profile->work != null){
                	$this->user->profile->work()->update(['address_id'=>$this->workAddress()]);
                }else{
                	$this->user->profile->work()->create(['address_id'=> $this->workAddress()]);
                }
                session()->flash('message','The profile business address updated');
                break;
            case 'home_address':
                if($this->user->profile->leave == null){
                	$this->user->profile->leave()->create(['address_id'=>$this->address()]);
                }else{
                	$this->user->profile->leave()->update(['address_id'=>$this->address()]);
                }
                session()->flash('message','The profile home address updated');
                break;
            
            case 'new_biography':
               $this->user->profile->update(['about_me'=>$this->data['about_me']]);
                session()->flash('message','The profile biography updated');
                break;
            
            default:
                # code...
                break;
        }
	}
}