<?php

namespace Modules\Search\Services\Traits;

class NewSearch

{

	public $results;

	public $profile;

	public function __construct()
	{
		$this->profile = session('profile');
		$this->makeSearch();
	}

	public function makeSearch()
	{
		switch (session('search')['type']) {
			case 'Father':
				$this->results = $this->profile->thisProfileFathers();
				break;
			case 'Mother':
				$this->results = $this->profile->thisProfileMothers();
				break;
			
			case 'Grandmother':
				$this->results = $this->profile->thisProfileGrandMothers();
				break;
			case 'Grandfather':
				$this->results = $this->profile->thisProfileGrandFathers();
				break;
		    case 'Wife':
				$this->results = $this->profile->thisProfileWives();
				break;
				
			case 'Husband':
				$this->results = $this->profile->thisProfileHusband();
				break;

			case 'Children':
				$this->results = $this->profile->thisProfileChildren();
				break;

		    case 'Brother':
				$this->results = $this->profile->thisProfileBrothers();
				break;

			case 'Sister':
				$this->results = $this->profile->thisProfileSisters();
				break;
		
			case 'Uncle':
				$this->results = $this->profile->thisProfileUncles();
				break;		
			default:
				$this->results = $this->profile->thisProfileAunties();
				break;
		}
	}
}