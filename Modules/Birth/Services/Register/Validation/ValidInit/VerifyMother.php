<?php

namespace Modules\Birth\Services\Register\Validation\ValidInit;

use Modules\Marriage\Entities\Status;

use App\User;

use Modules\Family\Entities\Family;

trait VerifyMother

{
	
    public function nameAuth()
    {
    	$this->wifeStatus();
        $user_id = $this->motherUserIds();
        $flag = false;
        foreach($user_id as $id){
            dd($this->status->wife[0]);
			if($this->status->wife[0]->profile->user->id == $id){
			    $flag = true;
			}
        }
        if($flag == false){
        	$this->error[] = "Mother's name authentication fails invalid combination of mother name and surname or mother status";
        }
    	
    }
    private function wifeStatus()
    {
    	foreach(Family::find(session('family')['family'])->admin->profile->husband->marriages as $marriage){
            if($marriage->is_active == 1 && $marriage->wife->status_id == Status::find($this->data['mother_status'])->id){
            	$this->status = $marriage->wife->status;
            }
    	}

    }
    public function motherUserIds()
    {
    	$id = [];

        foreach(User::where(['first_name'=>$this->data['mother_first_name'],
    		'last_name'=>$this->data['mother_last_name']])->get() as $user){
        	$id[] = $user->id;
        }
        return $id;
    }
}