<?php

namespace Modules\Family\Services\Family;

use Modules\Family\Entities\Family;

use Modules\Family\Entities\SubFamily;

/**
* this class take the family ID as param and return it root
*/
class RootFamily
{
	protected $family;

	function __construct($family)
	{
		$this->family = $family
		$this->getRoot($this->family);
	}

	protected function getRoot(Family $family)
	{
        if($family->subFamilies != null){
        	foreach (SubFamily::where('sub_family_id',$this->family->id)->get as $root) {
				$this->family = Family::find($root->family->id);
				$this->getRoot($this->family);
			}
        }
		return $this->family;
	}
}