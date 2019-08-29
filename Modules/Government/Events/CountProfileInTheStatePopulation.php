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
        $this->month = Month::firstOrCreate(['month'=>date('F')]);
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

    public function updateTownPopulation()
    {
        //get the last month of the year
        $town_population = $this->profile->thisProfileFamily()->location->town->townPopulationCollations()->get()->last();
        
        //if this month population exit update it from the population of the last month
        if($town_population){
            $town_population->updateOrCreate(
                ['year_id'=>$this->year->id,'month_id'=>$this->month->id],
                ['population'=>$town_population->population += 1]
            );
        }else{
            $this->profile->thisProfileFamily()->location->town->townPopulationCollations()->firstOrCreate([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'population'=>1
            ]);
        }
        
    }
    
    public function updateDistrictPopulation()
    {
        $district_population = $this->profile->thisProfileFamily()->location->town->district->districtPopulationCollations()->get()->last();

        if($district_population){
            $district_population->updateOrCreate(
                ['year_id'=>$this->year->id,'month_id'=>$this->month->id],
                ['population'=>$district_population->population += 1]
            );
        }else{
            $this->profile->thisProfileFamily()->location->town->district->districtPopulationCollations()->firstOrCreate(
                [
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'population'=>1
                ]
            );
        }
    }

    public function updateLgaPopulation()
    {
        $lga_population = $this->profile->thisProfileFamily()->location->town->district->lga->lgaPopulationCollations()->get()->last();
        if($lga_population){
            $lga_population->updateOrCreate(
                ['year_id'=>$this->year->id,'month_id'=>$this->month->id],
                ['population'=>$lga_population->population += 1]
            );
        }else{
            $this->profile->thisProfileFamily()->location->town->district->lga->lgaPopulationCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'population'=>1
                ]
            );
        }
    }

    public function countInThePopulation()
    {
        $this->updateTownPopulation();
        $this->updateDistrictPopulation();
        $this->updateLgaPopulation();
    }
}
