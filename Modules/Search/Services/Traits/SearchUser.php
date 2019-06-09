<?php

namespace Modules\Search\Services\Traits;

use App\User;
use Modules\Family\Services\Family\ValidFamilies;

trait SearchUser

{
	public function searchUsers($name, $sname)
	{
		$users = [];
		$familie_ids = [];
		$count = 0;
		$family = new ValidFamilies();
		$valid_families = $family->families;
		foreach ($valid_families as $family) {
			$familie_ids[] = $family->id;
		}
		foreach(User::where('first_name','like',"%$name")->where('last_name',$sname)->get() as $user){
            if($user->profile != null){
				$count++;
				if(!in_array($user->profile->thisProfileFamilyId(), $familie_ids)){
					$users[] = ['user'=>$user, 'status' => 'none accessible'];
				}else{
                    $users[] = ['user'=>$user, 'status' => 'accessible'];
				}
	        }
	    }
        session()->flash('count',$count);
        return $users;
            
	}
}