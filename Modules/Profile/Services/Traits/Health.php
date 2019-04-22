<?php

namespace Modules\Profile\Services\Traits;
 
use Modules\Profile\Entities\Genotype;

use Modules\Profile\Entities\BloodGroup; 

use Modules\Profile\Entities\Desease; 
 
trait Health

{
	public function healthStatus()
	{
		return [
			'blood'=>$this->profileHealth->bloodGroup != null ? $this->profileHealth->bloodGroup->name : 'Not Available',
			'genotype'=>$this->profileHealth->genotype != null ? $this->profileHealth->genotype->name : 'Not Available',
			'weight'=>$this->profileHealth != null ? $this->profileHealth->weight : 'Not Available',
			'status'=>$this->profileHealth->desease != null ? $this->profileHealth->desease->name : 'Not Available',
		];
	}

	public function newHealth()
	{
		$profile = Auth()->User()->profile;

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
