<?php

namespace Modules\Marriage\Register\Marriage;

use Modules\Marriage\Register\Marriage\RegisterEnd\RegisterThisMarriage;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidateRequest;

use Modules\Family\Services\Account\Family as NewChildFamily;

class MarriageRegistered

{

	use ValidateRequest, RegisterThisMarriage, NewChildFamily;

    public $data;
    
    public $error;

	public function __construct($data)
	{
		$this->error = [];
		$this->data = $data;
		$this->data = $this->prepareData($data);
		$this->registeredNewMarriage();
	}
      
    public function registeredNewMarriage()
    {

    	$validate = $this->validateMarriageRequest();
       
        if(empty($this->error)){
         
        	switch (session('register')['status']) {
	        	case 'father':
	        		$this->registerMarriage();
	        		$message = "Congratulation your Marriage was register successfully";
	        		break;
	        	case 'son':
	        		//create family account then register marriage
	        	 
                    $this->registerFamily();
                    $this->registerMarriage();
                    $message = 'Congratulation the child marriage was register successfully and the new family account is creted for the child which is subling of the selected family of your family';
	        		break;
	        	case 'daughter':
	        		//create family account for the husband then register the marriage
	        	    $this->registerFamily();
                    $this->registerMarriage();
                    $message = "Congratulation the daughter's marriage was register successfully and the new family account was created for the husband which is related to your family by marriage of your family";
	        		break;
	        	default:
	        		session()->flash('message','Unknown marriage');
	        		break;
	        }
	        session()->flash('message', $message);

        }else{
        	dd($this->error);
        	session()->flash('error', $this->error);
        } 
        
    }

    public function registerMarriage(){

        $this->register();
    }


}