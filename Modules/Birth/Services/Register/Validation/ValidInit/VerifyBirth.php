<?php

namespace Modules\Birth\Services\Register\Validation\ValidInit;

use App\User;

trait VerifyBirth

{
    
	public function nextBirthAuth()
	{

        $date = [];
     
        foreach($this->mother->births as $birth){
            $date[] = $birth->data;
        }

        if(strtotime($this->data['date']) < 15552000 + last($date)){
        	$this->error[] = "Birth authentication fails depending of the registered previous birth father and mother are too early to give another birth";
        }
	}

	public function firstBirthAuth()
	{
       $wife = User::find($this->mother_id($this->data['mother_first_name']))->profile->wife;
        
        if(strtotime($this->data['date']) < 15552000 + $wife->validDatOfMarriage()){
            $this->error[] = "Birth authentication fails depending of the marriage registration date and birth registration date husband and wife are too early to give first birth";
        }

        if(strtotime($this->data['date']) > time()){
            $this->error[] = "Birth authentication fails you are using the date ahead of today you must use todays date or prviouse date ";
        }
	}
    protected function mother_id($name)
    {
        return substr($name, strpos($name, '.')+1);
    }
}