<?php
namespace Modules\Health\Services\Traits;

use Modules\Health\Entities\Treatment;
use Modules\Health\Entities\Infection;
use Modules\Health\Entities\MedicalCondition;
use Modules\Health\Entities\DischargeCondition;

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

}