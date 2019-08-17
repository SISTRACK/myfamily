<?php

namespace Modules\Education\Entities;

use Modules\Core\Entities\BaseModel;

class SchoolReport extends BaseModel
{
    public function admitted()
    {
    	return $this->belongsTo(Admitted::class);
    }

    public function schoolReportType()
    {
    	return $this->belongsTo(SchoolReportType::class);
    }

}
