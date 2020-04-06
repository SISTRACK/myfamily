<?php
namespace Modules\Profile\Services\Traits;

trait HasIdentificationNumber

{
	public function identificationNo()
	{
		return $this->familyProfileCount->family->areaFamilyCount->area->town->district->lga->state->code.
		       $this->familyProfileCount->family->areaFamilyCount->area->town->district->lga->code.
		       $this->familyProfileCount->family->areaFamilyCount->area->town->district->code.
		       $this->familyProfileCount->family->areaFamilyCount->area->town->code.
		       $this->familyProfileCount->family->areaFamilyCount->area->code.
		       $this->encryptCode($this->formatCode($this->familyProfileCount->family->areaFamilyCount->count),0).
		       $this->encryptCode($this->formatCode($this->familyProfileCount->count), 1);
	}

	public function formatCode($code)
	{
		if($code < 10){
			$code = '0'.$code;
		}

		return $code;
	}

	public function encryptCode($code,$strenth)
	{
		$hash = [
			'0'=>'A','1'=>'B','2'=>'C','3'=>'D','4'=>'E','5'=>'F','6'=>'G','7'=>'H','8'=>'I','9'=>'J',
			'10'=>'K','11'=>'L','12'=>'M','13'=>'N','14'=>'O','15'=>'P','16'=>'Q','17'=>'R','18'=>'S','19'=>'T',
			'20'=>'U','21'=>'V','22'=>'V','23'=>'X','24'=>'Y','25'=>'Z'
		];
		$begin = substr($code,0, 1);
		$end = substr($code,1, 1);
		if($strenth == 1){
			$begin = $this->hashFunction(substr($code,0, 1));
			$end = $this->hashFunction(substr($code,1, 1));
		}
		foreach ($hash as $key => $value) {
			if($key == $begin){
				$begin = $value;
			}

			if($key == $end){
				$end = $value;
			}
		}

		return $begin.$end;
	}

	public function hashFunction($number)
	{
		return floor(($number + 3) - (7 / 2) + (5 * 3));
	}
}
