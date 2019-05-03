<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model


{

	protected $guarded = [];

    public function status()
    {
    	return $this->belongsTo(AdminStatus::class);
    }
    public function area()
    {
    	return $this->belongsTo('Modules\Address\Entities\Area');
    }
    public function town()
    {
    	return $this->belongsTo('Modules\Address\Entities\Town');
    }
    public function lga()
    {
    	return $this->belongsTo('Modules\Address\Entities\Lga');
    }

    public function state()
    {
    	return $this->belongsTo('Modules\Address\Entities\State');
    }

    public function profile()
    {
    	$this->belongsTo('Modules\Profile\Entities\Profile');
    }
    


}
