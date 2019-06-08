<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\Profile\Services\Traits\ProfileEloquentRelations;

class Profile extends Model
{
    protected $guarded = [];

    use ProfileEloquentRelations;

    public function birth()
    {
        $count = [];
        if($this->gender->name = 'Male' && $this->husband != null && $this->husband->father != null){
            foreach ($this->husband->father->births as $birth) {
                $count[] = $birth;
            }
        }else{
            foreach ($this->wife->mother->births as $birth) {
                $count[] = $birth;
            }
        } 
        return $count;
    }

    public function profileAccessibleBy()
    {
        $array = [];
        foreach (ProfileAccess::where(['access_to_id'=>$this->id,'is_active'=>1])->get() as $access) {

            $array[] = $this->find($access->profile_id); 
        }
        return $array;
    }

    public function profileAccessibleTo()
    {
        $array = [];
        foreach ($this->accesses as $access) {
            if($access->is_active == 1){
                 $array[] = $this->find($access->access_to_id); 
            }
        }
        return $array;
    }

}
