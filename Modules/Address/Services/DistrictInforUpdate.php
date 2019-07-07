<?php
namespace Modules\Address\Services;

trait DistrictInforUpdate

{
	public function families()
	{
		$families = [];
		foreach ($this->towns as $town) {
			foreach ($town->locations as $location) {
				foreach ($location->families as $family) {
					$families[] = $family;
				}
			}
		}
		return $families;
	}

	public function users()
	{
		$users = [];
		foreach ($this->towns as $town) {
			foreach ($town->areas as $area) {
				$users[] = $area->house->address->profile->user;
			}
		}
		return $users;
	}

	public function marriages()
	{
		$marriages = [];
		foreach ($this->towns as $town) {
			foreach ($town->areas as $area) {
				foreach ($area->house->address->profile->husband->marriages as $marriage) {
					$marriages[] = $marriage;
				}
			}
		}
		return $marriages;
	}

	public function births()
	{
		$births = [];
		foreach ($this->towns as $town) {
			foreach ($town->areas as $area) {
				foreach ($area->house->address->profile->husband->father->births as $birth) {
					$births[] = $birth;
				}
			}
		}
		return $births;
	}

	public function deaths()
	{
		$deaths = [];
		foreach ($this->towns as $town) {
			foreach ($town->areas as $area) {
				$births[] = $area->house->address->profile->death;
			}
		}
		return $deaths;
	}

	public function divorces()
	{
		$divorces = [];
		foreach ($this->towns as $town) {
			foreach ($town->areas as $area) {
				foreach ($area->house->address->profile->husband->marriages as $marriage) {
					$divorces[] = $marriage->divorce;
				}
			}
		}
		return $divorces;
	}

	public function returnDivorces()
	{
		$return_wife = [];
		foreach ($this->towns as $town) {
			foreach ($town->areas as $area) {
				foreach ($area->house->address->profile->husband->marriages as $marriage) {
					foreach ($marriage->divorce->details as $detail) {
						$return_wife[] = $detail->return;
					}
				}
			}
		}
		return $return_wife;
	}
}