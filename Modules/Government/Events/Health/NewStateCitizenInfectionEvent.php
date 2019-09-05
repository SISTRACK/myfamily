<?php

namespace Modules\Government\Events\Health;

use Illuminate\Queue\SerializesModels;
use Modules\Government\Entities\Month;
use Modules\Government\Entities\Year;
use Modules\Health\Entities\HospitalAdmission;

class NewStateCitizenInfectionEvent
{
    use SerializesModels;
    private $infection;
    private $location;
    private $month;
    private $year;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(HospitalAdmission $admission)
    {
        $this->year = Year::firstOrCreate(['year'=>date('Y')]);
        $this->month = $this->getCurrentMonth();
        $this->infection = $admission->diagnose->infection;
        $this->location = $admission->profile->thisProfileFamily()->location;
        $this->countInTheInfection();
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
    public function updateAreaInfection()
    {
        //get the last month of the year
        $area_infection = $this->location->area->areaInfectionReportCollations->last();
        
        //if this month infection exit update it from the infection of the last month
        if($area_infection){
            if($area_infection->month_id == $this->month->id && $area_infection->infection_id == $this->infection->id){
                $area_infection->update([
                    'infection'=>$area_infection->infection += 1,
                    'monthly_infection'=>$area_infection->monthly_infection += 1,
                ]);
            }else{
                $this->location->area->areaInfectionReportCollations()->create([
                'year_id'=>$this->year->id,
                'infection_id'=>$this->infection->id,
                'month_id'=>$this->month->id,
                'infection'=> $area_infection->infection + 1,
                'monthly_infection'=> 1
            ]);
            }
        }else{
            $this->location->area->areaInfectionReportCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'infection_id'=>$this->infection->id,
                'infection'=>1,
                'monthly_infection'=>1
            ]);
        }
        
    }

    public function updateTownInfection()
    {
        //get the last month of the year
        $town_infection = $this->location->area->town->townInfectionReportCollations->last();
        
        //if this month infection exit update it from the infection of the last month
        if($town_infection){
            if($town_infection->month_id == $this->month->id && $town_infection->infection_id == $this->infection->id){
                $town_infection->update([
                    'infection'=>$town_infection->infection += 1,
                    'monthly_infection'=>$town_infection->monthly_infection += 1,
                ]);
            }else{
                $this->location->area->town->townInfectionReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'infection_id'=>$this->infection->id,
                    'infection'=> $town_infection->infection + 1,
                    'monthly_infection'=> 1
                ]);
            }
        }else{
            $this->location->area->town->townInfectionReportCollations()->create([
                'year_id'=>$this->year->id,
                'infection_id'=>$this->infection->id,
                'month_id'=>$this->month->id,
                'infection'=>1,
                'monthly_infection'=>1
            ]);
        }
        
    }
    
    public function updateDistrictInfection()
    {
        $district_infection = $this->location->area->town->district->districtInfectionReportCollations->last();

        if($district_infection){
            if($district_infection->month_id == $this->month->id && $district_infection->infection_id == $this->infection->id){
                $district_infection->update([
                    'infection'=>$district_infection->infection += 1,
                    'monthly_infection'=>$district_infection->monthly_infection += 1,
                ]);
            }else{
                $this->location->area->town->district->districtInfectionReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'infection_id'=>$this->infection->id,
                    'month_id'=>$this->month->id,
                    'infection'=> $district_infection->infection + 1,
                    'monthly_infection'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->districtInfectionReportCollations()->create(
                [
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'infection_id'=>$this->infection->id,
                    'infection'=>1,
                    'monthly_infection'=>1
                ]
            );
        }
    }

    public function updateLgaInfection()
    {
        $lga_infection = $this->location->area->town->district->lga->lgaInfectionReportCollations->last();
        if($lga_infection){
            if($lga_infection->month_id == $this->month->id && $lga_infection->infection_id == $this->infection->id){
                $lga_infection->update([
                    'infection'=>$lga_infection->infection += 1,
                    'monthly_infection'=>$lga_infection->monthly_infection += 1,
                ]);
            }else{
                $this->location->area->town->district->lga->lgaInfectionReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'infection_id'=>$this->infection->id,
                    'month_id'=>$this->month->id,
                    'infection'=> $lga_infection->infection + 1,
                    'monthly_infection'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->lga->lgaInfectionReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'infection_id'=>$this->infection->id,
                    'month_id'=>$this->month->id,
                    'infection'=>1,
                    'monthly_infection'=>1
                ]
            );
        }
    }

    public function countInTheInfection()
    {
        $this->updateAreaInfection();
        $this->updateTownInfection();
        $this->updateDistrictInfection();
        $this->updateLgaInfection();
    }
}
