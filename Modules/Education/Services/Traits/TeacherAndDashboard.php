<?php
namespace Modules\Education\Services\Traits;

trait TeacherAndDashboard

{

	public function admittedSinceEstablished()
	{
		$admitteds = [];

		foreach ($this->school->admitteds as $admitted) {
			$admitteds[] = $admitted; 
		}

		return $admitteds;

	}

	public function admittedThisYear()
	{
		$admitteds = [];

		foreach ($this->admittedSinceEstablished() as $admitted) {
			if($admitted->year == date('Y')){
				$admitteds[] = $admitted; 
			}
		}

		return $admitteds;
	}

	public function graduatedSinceEstablished()
	{
		$graduates = [];

		foreach ($this->admittedSinceEstablished() as $admitted) {
			if($admitted->graduated){
				$graduates[] = $admitted->graduated; 
			}
		}
		
		return $graduates;
	}

	public function graduatedThisYear()
	{
		$graduates = [];

		foreach ($this->graduatedSinceEstablished() as $graduate) {
			if($graduate->year == date('Y')){
				$graduates[] = $graduate; 
			}
		}

		return $graduates;
	}


	public function reportedSinceEstablished()
	{
		$reports = [];

		foreach ($this->admittedSinceEstablished() as $admitted) {
			if($admitted->schoolReport){
				$reports[] = $admitted->schoolReport; 
			}
		}
		
		return $reports;
	}

	public function reportedThisYear()
	{
		$reports = [];

		foreach ($this->reportedSinceEstablished() as $report) {
			if($report->year == date('Y')){
				$reports[] = $report; 
			}
		}

		return $reports;
	}

}