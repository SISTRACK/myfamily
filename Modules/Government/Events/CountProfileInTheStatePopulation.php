<?php

namespace Modules\Government\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Profile\Entities\Profile;
use Modules\Government\Entities\Month;
use Modules\Government\Entities\Year;

class CountProfileInTheStatePopulation
{
    use SerializesModels;
    private $profile;

    private $month;

    private $year;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Profile $profile)
    {
        $this->year = Year::firstOrCreate(['year'=>date('Y')]);
        $this->month = $this->getCurrentMonth();
        $this->profile = $profile;
        $this->countInThePopulation();
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
    public function getCurrentMonth()
    {
        foreach (Month::where('month',date('F'))->get() as $month) {
            return $month;
        }
    }
    public function updateAreaPopulation()
    {
        //get the last month of the year
        $area_population = $this->profile->thisProfileFamily()->location->area->areaPopulationCollations->last();
        
        //if this month population exit update it from the population of the last month
        if($area_population){
            if($area_population->month_id == $this->month->id){
                $area_population->update([
                    'population'=>$area_population->population += 1,
                    'monthly_population'=>$area_population->monthly_population += 1,
                ]);
            }else{
                $this->profile->thisProfileFamily()->location->area->areaPopulationCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'population'=> $area_population->population + 1,
                'monthly_population'=> 1
            ]);
            }
        }else{
            $this->profile->thisProfileFamily()->location->area->areaPopulationCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'population'=>1,
                'monthly_population'=>1
            ]);
        }
        
    }

    public function updateTownPopulation()
    {
        //get the last month of the year
        $town_population = $this->profile->thisProfileFamily()->location->area->town->townPopulationCollations->last();
        
        //if this month population exit update it from the population of the last month
        if($town_population){
            if($town_population->month_id == $this->month->id){
                $town_population->update([
                    'population'=>$town_population->population += 1,
                    'monthly_population'=>$town_population->monthly_population += 1,
                ]);
            }else{
                $this->profile->thisProfileFamily()->location->area->town->townPopulationCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'population'=> $town_population->population + 1,
                    'monthly_population'=> 1
                ]);
            }
        }else{
            $this->profile->thisProfileFamily()->location->area->town->townPopulationCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'population'=>1,
                'monthly_population'=>1
            ]);
        }
        
    }
    
    public function updateDistrictPopulation()
    {
        $district_population = $this->profile->thisProfileFamily()->location->area->town->district->districtPopulationCollations->last();

        if($district_population){
            if($district_population->month_id == $this->month->id){
                $district_population->update([
                    'population'=>$district_population->population += 1,
                    'monthly_population'=>$district_population->monthly_population += 1,
                ]);
            }else{
                $this->profile->thisProfileFamily()->location->area->town->district->districtPopulationCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'population'=> $district_population->population + 1,
                    'monthly_population'=> 1
                ]);
            }
        }else{
            $this->profile->thisProfileFamily()->location->area->town->district->districtPopulationCollations()->create(
                [
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'population'=>1,
                    'monthly_population'=>1
                ]
            );
        }
    }

    public function updateLgaPopulation()
    {
        $lga_population = $this->profile->thisProfileFamily()->location->area->town->district->lga->lgaPopulationCollations->last();
        if($lga_population){
            if($lga_population->month_id == $this->month->id){
                $lga_population->update([
                    'population'=>$lga_population->population += 1,
                    'monthly_population'=>$lga_population->monthly_population += 1,
                ]);
            }else{
                $this->profile->thisProfileFamily()->location->area->town->district->lga->lgaPopulationCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'population'=> $lga_population->population + 1,
                    'monthly_population'=> 1
                ]);
            }
        }else{
            $this->profile->thisProfileFamily()->location->area->town->district->lga->lgaPopulationCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'population'=>1,
                    'monthly_population'=>1
                ]
            );
        }
    }

    public function countInThePopulation()
    {
        $this->updateAreaPopulation();
        $this->updateTownPopulation();
        $this->updateDistrictPopulation();
        $this->updateLgaPopulation();
    }
}
