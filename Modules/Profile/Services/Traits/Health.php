<?php

namespace Modules\Profile\Services\Traits;
 
use Modules\Profile\Entities\Genotype;

use Modules\Profile\Entities\BloodGroup; 

use Modules\Profile\Entities\Desease; 

use Modules\Profile\Entities\Profile; 
 
trait Health

{
	public function healthStatus()
	{
		if($this->profileHealth == null || $this->profileHealth->bloodGroup == null){
            return [
				'blood'=>'Not Available',
				'genotype'=>'Not Available',
				'weight'=>'Not Available',
				'status'=>'Not Available',
			];
		}else{
			return [
				'blood'=>$this->profileHealth->bloodGroup->name,
				'genotype'=>$this->profileHealth->genotype->name,
				'weight'=>$this->profileHealth->weight,
				'status'=>$this->profileHealth->desease->name,
			];
		}
		
	}

	public function newHealth()
	{
		if(admin()){
			$profile = Profile::find(request()->route('profile_id'));
		}else{
			$profile = Auth()->User()->profile;
		}
		$desease_id = $this->getDeseaseId($this->data['desease']);
        $blood_group_id = $this->data['blood'];
        $genotype_id = $this->data['genotype'];

        if($profile->profileHealth == null){
            $profile->profileHealth()->create([
                'desease_id'=> $desease_id,
                'blood_group_id'=> $blood_group_id,
                'genotype_id'=> $genotype_id,
                'weight'=> $this->data['weight'],
            ]);
        }else{
            $profile->profileHealth()->update([
                'desease_id'=> $desease_id,
                'blood_group_id'=> $blood_group_id,
                'genotype_id'=> $genotype_id,
                'weight'=> $this->data['weight'],
            ]);
        }

        if ($this->getDeseaseId($this->data['desease']) != 1) {
        	Desease::find($desease_id)->deseaseUndergoes()->create(['profile_id' => $profile->id]);
        }

	}

	public function blood()
	{
        return BloodGroup::all();
	}
    public function getDeseaseId($desease)
	{
		$desease = Desease::firstOrCreate(['name'=>$desease]);
        
        return $desease->id; 
	}
	public function genotype()
	{
		return Genotype::all();
        
	}
}
