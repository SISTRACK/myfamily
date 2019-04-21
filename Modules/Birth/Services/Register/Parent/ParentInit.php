<?php

namespace Modules\Birth\Services\Register\Parent;

use App\User;
trait ParentInit
{
	public $father;
	public $mother;
	
	public function createMother()
	{
        $this->mother = User::find($this->id($this->data['mother_first_name']))->profile->wife->mother()->firstOrCreate([]);
	}

	public function createFather()
	{
        $this->father = User::find($this->data['user_id'])->profile->husband->father()->firstOrCreate([]);
	}

	public function handleParent()
	{
		$this->father = $this->createFather();
		$this->mother = $this->createMother();
	}
}