<?php

namespace Modules\Divorce\Services\Registration;

use App\User;
/**
* this class will take the husband and wife information and de activate their marriage
*/
class DivorceWife 
{
	protected $wife;
    public $error = [];
	function __construct($data)
	{
		$this->data = $data;
		$this->validate();
		$this->divorce();
	}

	protected function divorce()
	{
        if($this->error == null){
        	foreach($this->wife->marriages as $marriage){
	        	if($marriage->is_active == 1){
	        		if($marriage->divorce == null){
		        		$divorce = $marriage->divorce()->firstOrCreate([
		        			'counter' => 1
		        	    ]);
	        		}else{
	                    $marriage->divorce->update([
		        			'counter' => $marriage->divorce->counter + 1
		        	    ]);
		        	    $divorce = $marriage->divorce;
		        	    $divorce->is_active = 1;
		        	    $divorce->save();
	        		}
	        		$marriage->update(['is_active'=>0]);
	        	    $divorce->details()->create([
	                    'date'=>strtotime($this->data['date']),
	        			'reason'=>$this->data['reason'],
	        	    ]);
	        	    session()->flash('message','The divorce was registered successfully');
	        	}
	        }
        }else{
        	session()->flash('error',$this->error);
        }
	}

	protected function validate()
	{
        $this->wife = User::find($this->data['first_name'])->profile->wife;
        foreach ($this->wife->marriages as $marriage) {
        	if($marriage->is_active == 1 && $marriage->date > strtotime($this->data['date'])){
			    $this->error[] = 'Divorce date Authentication fails : the marriage date is greater than divorce date';
        	}
        }
        if(strtotime($this->data['date']) > time()){
        	$this->error[] = 'Divorce date Authentication fails : use previous date of today or todays date';
        }
	}
}