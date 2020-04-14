<?php
namespace Modules\Profile\Services\Traits;

use Modules\Family\Services\Family\ValidFamilies;

trait HasRelatedFamilies  
{

    public function relatedFamilies()

	{
        $family = new ValidFamilies;
        return $family->families;
        
	}
}  	