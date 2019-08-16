<?php
namespace Modules\Education\Services\Traits;

trait SchoolGraduation

{
	public function getValidYearOfGraduation()
	{
		$year = 0;
		switch ($this->schoolType->name) {
			case 'Nursery':
				$year = 3;
				break;
			case 'Primary':
				$year = 6;
				break;
			case 'Secondary':
				$year = 6;
				break;
			default:
				
				break;
		}
		return $year;
	}
    
    public function studentToGraduateThisYearAndElear()
    {
    	$graduates = [];
    	foreach ($this->admitteds as $admitted) {
    		if($this->currentYear() - $admitted->year >= $this->getValidYearOfGraduation()){
    			$graduates[] = $admitted;
    		}
    	}
    	return $graduates;
    }
    
    public function currentYear()
    {
    	return date('Y');
    }
}