<?php
namespace Modules\Education\Services\Traits;

trait StudentGraduation

{
	
	public function expectedYearsToGraduate()
	{

		$school_graduate_attempt_after = $this->school->getValidYearOfGraduation();
        
		$graduation_limit_years = ($school_graduate_attempt_after * 2);
        
        $this_student_can_graduate_before = $this->year + $graduation_limit_years;
        
        $years = [];

		for ($year = $this->year ; $year <= $this_student_can_graduate_before ; $year++) { 
			$years[] = $year;
		}
        
		return $years;
	}
}

