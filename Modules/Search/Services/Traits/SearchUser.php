<?php

namespace Modules\Search\Services\Traits;

use App\User;

trait SearchUser

{
	public function searchUsers($name, $sname)
	{
		$users = [];
		$count = 0;
		foreach(User::where('first_name','like',"%$name")->where('last_name',$sname)->get() as $user){
            if($user->profile != null){
				$count++;
	            $users[] = $user;
	            }
	        }
        session()->flash('count',$count);
        return $users;
            
	}
}