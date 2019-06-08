<?php

namespace Modules\Profile\Services\Traits;

trait Relatives
{
	public function thisProfileFather()
	{
		$father = null;
		if($this->child != null){
			$father = $this->child->birth->father->husband->profile;
		}
		return $father;
	}

	public function thisProfileMother()
	{
		$mother = null;
		if($this->child != null){
			$mother = $this->child->birth->mother->wife->profile;
		}
		return $mother;
	}

	public function thisProfileBrothers()
	{   
		$brothers = [];
		foreach ($this->thisProfileFather()->thisProfileChildren() as $child) {
			if($child->profile->gender->name == 'Male'){
				$brothers[] = $child;
			}
		}
		return $brothers;
	}
	public function thisProfileSisters()
	{
		$sisters = [];
		foreach ($this->thisProfileFather()->thisProfileChildren() as $child) {
			if($child->profile->gender->name == 'Female'){
				$sisters[] = $child;
			}
		}
		return $sisters;
	}
	public function thisProfileUncles()
	{
		$uncles = [];
		if($this->thisProfileMother()->child != null){
			foreach($this->thisProfileMother()->thisProfileFather()->thisProfileChildren() as $uncle){
				if($uncle->gender->name == 'Male'){
					$uncles[] = $uncle;
				}
			}
		}
		return $uncles;
	}
	public function thisProfileAunties()
	{
		$aunties = [];
		if($this->thisProfileFather()->child != null){
			foreach($this->thisProfileFather()->thisProfileFather()->thisProfileChildren() as $aunty){
				if($uncle->gender->name == 'Female'){
					$aunties[] = $aunty;
				}
			}
		}
		return $aunties;
	}

	public function thisProfileGrandFathers()
	{
		return $this->thisProfileFather()->thisProfileFather();
	}

	public function thisProfileGrandMothers()
	{
		return $this->thisProfileMother()->thisProfileMother();
	}

	public function thisProfileChildren()
	{
		$children = [];
		if($this->isFather()){
            foreach($this->husband->father->births as $birth){
				$children[] = $birth->child->profile;
			}
		}else if($this->isMother()){
            foreach($this->wife->mother->births as $birth){
				$children[] = $birth->child->profile;
			}
		}
	}
	
	public function thisProfileWives()
	{
        $marriages = [];
		foreach($this->numberOfWives() as $marriage){
			if($marriage->is_active == 1){
				$marriages[] = $marriage->wife->profile;
			}
		}
	}
}