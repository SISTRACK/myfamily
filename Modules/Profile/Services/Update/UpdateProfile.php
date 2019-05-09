<?php

namespace Modules\Profile\Services\Update;

use Modules\Address\Services\LivingAddress;

use Modules\Address\Services\WorkAddress;

use Modules\Profile\Services\Traits\Expertices;

use Modules\Profile\Services\Traits\Health;

use Modules\Profile\Services\Traits\Experiences;

use Modules\Profile\Services\Traits\CreateWorkHistory;

use Modules\Profile\Services\Traits\Access;


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

    use WorkAddress, LivingAddress, Expertices, CreateWorkHistory 
    , Experiences, Health, Access;

    protected function ValidUser()
    {
    	return Auth()->User();
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
                # code...
                break;

            case 'new_health':
                $this->newHealth();
                session()->flash('message','The profile health information updated successfully');
                break;
            
            case 'profile_image':
                if($file =  request()->file($this->data['image'])){
	                $name = time().$file->getClientOriginalName();
	                $file->move('images/profile',$name);
	                $image = $this->user->profile->image()->create(['image'=>$name]);
	                $this->user->profile()->update(['image_id'=>$image->id]);
	                session()->flash('message','Profile image uploaded Successfully');
	            }else{
	            	session()->flash('error',['no file selected']);
	            }
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