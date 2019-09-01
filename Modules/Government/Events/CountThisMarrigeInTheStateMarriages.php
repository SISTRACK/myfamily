<?php

namespace Modules\Government\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Marriage\Entities\Marriage;
use Modules\Government\Entities\Month;
use Modules\Government\Entities\Year;

class CountThisMarrigeInTheStateMarriages
{
    use SerializesModels;
    private $location;
    private $month;
    private $year;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Marriage $marriage)
    {
        $this->year = Year::firstOrCreate(['year'=>date('Y')]);
        $this->month = $this->getCurrentMonth();
        $this->location = $marriage->husband->profile->family->location;
        $this->countInTheMarriage();
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

    public function updateAreaMarriage()
    {
        //get the last month of the year
        $area_marriage = $this->location->area->areaMarriageCollations->last();
        
        //if this month marriage exit update it from the marriage of the last month
        if($area_marriage){
            if($area_marriage->month_id == $this->month->id){
                $area_marriage->update([
                    'marriage'=>$area_marriage->marriage += 1,
                    'marriage'=>$area_marriage->monthly_marriage += 1
                ]);
            }else{
                $this->location->area->areaMarriageCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'marriage'=> $area_marriage->marriage + 1,
                    'monthly_marriage'=> 1
                ]);
            }
        }else{
            $this->location->area->areaMarriageCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'marriage'=>1,
                'monthly_marriage'=>1
            ]);
        }
        
    }

    public function updateTownMarriage()
    {
        //get the last month of the year
        $town_marriage = $this->location->area->town->townMarriageCollations->last();
        
        //if this month marriage exit update it from the marriage of the last month
        if($town_marriage){
            if($town_marriage->month_id == $this->month->id){
                $town_marriage->update([
                    'marriage'=>$town_marriage->marriage += 1,
                    'marriage'=>$town_marriage->monthly_marriage += 1
                ]);
            }else{
                $this->location->area->town->townMarriageCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'marriage'=> $town_marriage->marriage + 1,
                    'monthly_marriage'=> 1
                ]);
            }
        }else{
            $this->location->area->town->townMarriageCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'marriage'=>1,
                'monthly_marriage'=>1
            ]);
        }
    }
    
    public function updateDistrictMarriage()
    {
        //get the last month of the year
        $district_marriage = $this->location->area->town->district->districtMarriageCollations->last();
        
        //if this month marriage exit update it from the marriage of the last month
        if($district_marriage){
            if($district_marriage->month_id == $this->month->id){
                $district_marriage->update([
                    'marriage'=>$district_marriage->marriage += 1,
                    'marriage'=>$district_marriage->monthly_marriage += 1
                ]);
            }else{
                $this->location->area->town->district->districtMarriageCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'marriage'=> $district_marriage->marriage + 1,
                    'monthly_marriage'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->districtMarriageCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'marriage'=>1,
                'monthly_marriage'=>1
            ]);
        }
    }

    public function updateLgaMarriage()
    {
        //get the last month of the year
        $lga_marriage = $this->location->area->town->district->lga->lgaMarriageCollations->last();
        
        //if this month marriage exit update it from the marriage of the last month
        if($lga_marriage){
            if($lga_marriage->month_id == $this->month->id){
                $lga_marriage->update([
                    'marriage'=>$lga_marriage->marriage += 1,
                    'marriage'=>$lga_marriage->monthly_marriage += 1
                ]);
            }else{
                $this->location->area->town->district->lga->lgaMarriageCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'marriage'=> $lga_marriage->marriage + 1,
                    'monthly_marriage'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->lga->lgaMarriageCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'monthly_marriage'=>1,
                'marriage'=>1,
            ]);
        }
    }

    public function countInTheMarriage()
    {
        $this->updateAreaMarriage();
        $this->updateTownMarriage();
        $this->updateDistrictMarriage();
        $this->updateLgaMarriage();
    }
}
