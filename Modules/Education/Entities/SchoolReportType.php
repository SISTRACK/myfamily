<?php

namespace Modules\Education\Entities;

use Modules\Core\Entities\BaseModel;

class SchoolReportType extends BaseModel
{
    public function schoolReports()
    {
    	return $this->hasMany(SchoolReport::class);
    }
}
