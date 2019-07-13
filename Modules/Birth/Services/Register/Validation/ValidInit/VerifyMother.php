<?php

namespace Modules\Birth\Services\Register\Validation\ValidInit;

use Modules\Marriage\Entities\Status;

use App\User;

use Modules\Family\Entities\Family;

trait VerifyMother

{
	public $wife;
    public function nameAuth()
    {
    	$this->wifeStatus();
        $user_id = $this->motherUserIds();
        $flag = false;
        foreach($user_id as $id){

			if($this->id($this->data['mother_first_name']) == $id){
                $this->wife = User::find($this->id($this->data['mother_first_name']))->profile->wife;
               
                if($this->wife->mother){
                    $this->mother = $this->wife->mother()->firstOrCreate([]);
                }
                
			    $flag = true;
			}
        }
        if($flag == false){
        	$this->error[] = "Mother's name authentication fails invalid combination of mother name and surname or mother status";
        }
    	
    }
    private function wifeStatus()
    {
        if(admin()){
            $family = session('family');
        }else{
            $family = Family::find(session('family')['family']);
        }
    	foreach($family->familyAdmin->profile->husband->marriages as $marriage){
            if($marriage->is_active == 1 && $marriage->wife->status_id == $this->data['mother_status']){
            	$this->status = $marriage->wife->status;
            }
    	}

    }
    public function motherUserIds()
    {
    	$id = [];
        foreach(User::where(['first_name'=>$this->name($this->data['mother_first_name']),
    		'last_name'=>$this->name($this->data['mother_last_name'])])->get() as $user){
        	$id[] = $user->id;
        }
        return $id;
    }

    protected function id($name)
    {
        return substr($name, strpos($name, '.')+1);
    }

    protected function name($name)
    {
        return substr($name, 0, strpos($name, '.'));
    }
}