<?php

namespace Modules\Profile\Services\Traits;
 
use App\User;

use Modules\Profile\Entities\ProfileAccess;

trait 	Access

{

	public function newAccess()
	{
		$error = [];

		$accessor_user = Auth()->User();
        
		$access_to_user = null;

		foreach(User::where('email',$this->data['email'])->get() as $user){
            $access_to_user = $user;
		}
        
        if($access_to_user != null && $access_to_user->id == $accessor_user->id){
        	$error[] = 'Sorry this is your email you can not give access to your self';
        }

		if (empty($error) && $access_to_user == null) {
			$error[] = 'This email does not exist in our record';
		}

        $user_access = null;
        foreach (ProfileAccess::where(['profile_id'=>$access_to_user->profile->id,'access_to_id'=>$accessor_user->profile->id])->get() as $access) {
        	$user_access = $access;
        }

		if(empty($error) && $accessor_user->profile != null && $user_access != null && $user_access->is_active == 1){
			$error[] = 'This email user already have access to your profile';
		}

		if(empty($error)){
			if($user_access != null && $user_access->is_active == 0){
                $user_access->is_active = 1;
                $user_access->save();
			}else{
				ProfileAccess::create(['access_to_id'=>$accessor_user->profile->id,'profile_id'=>$access_to_user->profile->id]);
			}
			
			session()->flash('message','Congratulations you ware successfully grant permission to'.' '.$this->data['email'].' '.'profile');
		}else{
            session()->flash('error',$error);
		}
	}
    
}
