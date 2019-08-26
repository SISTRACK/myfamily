<?php
namespace Modules\Health\Services\Traits;

use Modules\Health\Entities\Treatment;
use Modules\Health\Entities\Infection;
use Modules\Health\Entities\MedicalCondition;
use Modules\Health\Entities\DischargeCondition;
use Modules\Health\Entities\HospitalDepartment;
use Modules\Health\Entities\Discpline;
use Modules\Address\Entities\State;
use Modules\Profile\Entities\Gender;

trait DiagnoseAble

{
	public function treatments()
	{
		return Treatment::all();
	}

	public function infections()
	{
		return Infection::all();
	}

	public function medicalConditions()
	{
		return MedicalCondition::all();
	}

	public function dischargeConditions()
	{
		return DischargeCondition::all();
	}

	public function genders()
	{
		return Gender::all();
	}

	public function states()
	{
		return State::all();
	}

	public function departments()
	{
		return HospitalDepartment::all();
	}

	public function discplines()
	{
		return Discpline::all();
	}
	public function discharges()
	{
		$discharge = [];
		
		foreach ($this->hospitalAdmissions as $admission) {
			if($admission->dischargeAdmission){
				$discharge[] = $admission->dischargeAdmission;
			}
		}

		return $discharge;
	}

}