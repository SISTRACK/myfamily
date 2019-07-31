<?php
namespace Modules\Admin\Services\Traits;

use Modules\Birth\Entities\Deliver;
use Modules\Profile\Entities\Desease;

trait NewBirth
{
	private $child;

	private $health;

	public function createChild()
	{
        $this->child = session('child_profile')->child()->firstOrCreate([]);
        $this->child->profile->user->update(['last_name'=>session('father_profile')->user->first_name]);
	}

	public function createHealth()
	{
		$this->health = Desease::firstOrCreate(['name'=>$this->data['health_status']]);
	}
    
    public function profileHealth()
    {
    	$this->createChild();
    	$this->createHealth();
    	session('child_profile')->profileHealth()->firstOrCreate(['desease_id'=>$this->health->id]);
    }

    public function handleParent()
    {
    	return [
    		'father'=>session('father_profile')->husband->father()->firstOrCreate([]),
    		'mother'=>session('mother_profile')->wife->mother()->firstOrCreate([])
    	];
    }
	public function registerBirth()
    {   
    	$this->profileHealth();
    	$parent = $this->handleParent();
        $birth = $parent['mother']->births()->create([
        	'child_id'=>$this->child->id,
        	'father_id'=>$parent['father']->id,
        	'date'=>strtotime($this->data['date']),
        	'weight' => $this->data['weight'],
        	'place' => $this->data['place'],
            'deliver_at' =>$this->data['deliver_at'],
            'deliver_id' =>$this->deliveredBy()
        ]);
        $address = $parent['mother']->wife->profile->leave->address_id;
        $this->child->profile->leave()->create(['address_id'=>$address]);
          
    }

    public function deliveredBy()
    {
    	$deliver = Deliver::firstOrCreate(['first_name'=>$this->data['midwifery_name'],'last_name'=>$this->data['midwifery_surname']]);
    	return $deliver->id;
    }
}