<?php

namespace Modules\Birth\Services\Register\Validation;

use Modules\Birth\Services\Register\Parent\ParentInit;
use Modules\Birth\Services\Register\Validation\ValidInit\VerifyBirth;
use Modules\Birth\Services\Register\Validation\ValidInit\VerifyMother;
use Modules\Birth\Services\Register\Validation\ValidInit\VerifyChild;

trait ValidateBirthRequest

{    
    public $error = [];

    use VerifyMother, VerifyBirth, VerifyChild;

	public function Validate(){
        
        $this->nameAuth();

        if($this->mother != null){
            $this->nextBirthAuth();
        }else{
        	$this->firstBirthAuth();
        }
        if($this->error == null){
		    $this->createUser();
        	//$this->handleParent();
        	$this->handleChildProfile();
        }

	}
}