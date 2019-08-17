<?php
namespace Modules\Education\Services\Traits;

trait StudentGraduation

{
	private $graduation_limit_year;

	public function expectedYearsToGraduate()
	{

		$this->graduation_limit_year = $this->year + ($this->school->getValidYearOfGraduation() * 2);
                
        $years = [];

		for ($year = $this->studentCanGraduateAtThisYear() ; $year < $this->studentGraduationLimitYear() ; $year++) {

			$years[] = $year;
		}
        
		return $years;
	}

	public function studentCanGraduateAtThisYear()
	{
		return $this->year + $this->school->getValidYearOfGraduation();
	}

	public function studentGraduationLimitYear()
	{
		return $this->graduation_limit_year + $this->school->getValidYearOfGraduation();
	}

	public function canGraduateNow()
	{
		if(date('Y') - $this->year >= $this->school->getValidYearOfGraduation()){
            return true;
		}else{
            return false;
		}	    
	}

	public function remaininYearsToGraduate()
	{	
		return $this->school->getValidYearOfGraduation() - (date('Y') - $this->year);
	}

	
}

