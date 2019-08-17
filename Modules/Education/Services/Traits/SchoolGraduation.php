<?php
namespace Modules\Education\Services\Traits;

use Modules\Education\Entities\SchoolReportType;

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
    		if($this->currentYear() == $admitted->year){
    			$graduates[] = $admitted;
    		}
    	}
    	return $graduates;
    }
    
    public function currentYear()
    {
    	return request()->route('year');
    }

    public function yearsOfAdmission()
    {
    	$years = [];
        foreach(schoolAdmin()->school->admitteds as $admission){
            if(!in_array($admission->year, $years)){
                $years[] = $admission->year;
            }
        }
        return $years;
    }

    public function schoolReportTypes()
    {
        return SchoolReportType::all();
    }
}