<?php

namespace Modules\Profile\Services\Traits;
 
use Modules\Profile\Entities\Genotype;

use Modules\Profile\Entities\BloodGroup; 

use Modules\Profile\Entities\Desease; 
 
trait Expertices

{
	public function healthStatus()
	{
		return [
			'blood'=>$this->profileHealth->bloodGroup->name,
			'genotype'=>$this->profileHealth->genotype->name,
			'weight'=>$this->profileHealth->weight,
			'status'=>$this->profileHealth->desease->id == 1 ? 'Normal' : 'Sick',
		];
	}

	public function newHealth()
	{
		$profile = Auth()->User()->profile;
		
		$desease_id = $this->getDeseaseId($this->data['desease']);
        $blood_group_id = $this->getBloodId($this->data['blood_group']);
        $genotype_id = $this->getGenotypeId($this->data['genotype']);

        if($profile->profileHealth == null){
            $profile->prfileHealth()->create([
                'desease_id'=> $desease_id,
                'blood_group_id'=> $blood_group_id,
                'genotype_id'=> $genotype_id,
                'weight'=> $this->data['weight'],
            ]);
        }else{
            $profile->prfileHealth()->update([
                'desease_id'=> $desease_id,
                'blood_group_id'=> $blood_group_id,
                'genotype_id'=> $genotype_id,
                'weight'=> $this->data['weight'],
            ]);
        }

        if ($this->getDeseaseId($this->data['desease']) != 1) {
        	Desease::find($desease_id))->deseaseUndergoes()->create(['profile_id' => $profile->id]);
        }

	}

	public function getBloodId($blood)
	{
        foreach (BloodGroup::where('name',$blood) as $blood) {
        	return $blood->id;
        }
	}
    public function getDeseaseId($desease)
	{
		$desease = Desease::firstOrCreate(['name'=>$desease]);
        
        return $desease->id; 
	}
	public function getGenotypeId($gen)
	{
		foreach (Genotype::where('name',$gen) as $genotype) {
        	return $genotype->id;
        }
	}
}
