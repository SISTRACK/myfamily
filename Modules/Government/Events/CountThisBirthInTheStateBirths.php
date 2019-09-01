<?php

namespace Modules\Government\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Birth\Entities\Birth;

class CountThisBirthInTheStateBirths
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
    public function __construct(Birth $birth)
    {
        $this->year = Year::firstOrCreate(['year'=>date('Y')]);
        $this->month = $this->getCurrentMonth();
        $this->location = $birth->father->husband->profile->family->location;
        $this->countInTheBirth();
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
    public function updateAreaBirth()
    {
        //get the last month of the year
        $area_birth = $this->location->area->areaBirthCollations->last();
        
        //if this month Birth exit update it from the Birth of the last month
        if($area_birth){
            if($area_birth->month_id == $this->month->id){
                $area_birth->update([
                    'birth'=>$area_birth->birth += 1
                    'birth'=>$area_birth->monthly_birth += 1
                ]);
            }else{
                $this->location->area->areaBirthCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'birth'=> $area_birth->birth + 1,
                    'monthly_birth'=> 1
                ]);
            }
        }else{
            $this->location->area->areaBirthCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'birth'=>1,
                'monthly_birth'=>1
            ]);
        }
        
    }

    public function updateTownBirth()
    {
        //get the last month of the year
        $town_birth = $this->location->area->town->townBirthCollations->last();
        
        //if this month Birth exit update it from the Birth of the last month
        if($town_birth){
            if($town_birth->month_id == $this->month->id){
                $town_birth->update([
                    'birth'=>$town_birth->birth += 1
                    'birth'=>$town_birth->monthly_birth += 1
                ]);
            }else{
                $this->location->area->town->townBirthCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'birth'=> $town_birth->birth + 1,
                    'monthly_birth'=> 1
                ]);
            }
        }else{
            $this->location->area->town->townBirthCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'birth'=>1,
                'monthly_birth'=>1
            ]);
        }
    }
    
    public function updateDistrictBirth()
    {
        //get the last month of the year
        $district_birth = $this->location->area->town->district->districtBirthCollations->last();
        
        //if this month Birth exit update it from the Birth of the last month
        if($district_birth){
            if($district_birth->month_id == $this->month->id){
                $district_birth->update([
                    'birth'=>$district_birth->birth += 1,
                    'birth'=>$district_birth->monthly_birth += 1
                ]);
            }else{
                $this->location->area->town->district->districtBirthCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'birth'=> $district_birth->birth + 1,
                    'monthly_birth'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->districtBirthCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'birth'=>1
                'monthly_birth'=>1
            ]);
        }
    }

    public function updateLgaBirth()
    {
        //get the last month of the year
        $lga_birth = $this->location->area->town->district->lga->lgaBirthCollations->last();
        
        //if this month Birth exit update it from the Birth of the last month
        if($lga_birth){
            if($lga_birth->month_id == $this->month->id){
                $lga_birth->update([
                    'birth'=>$lga_birth->birth += 1
                    'birth'=>$lga_birth->monthly_birth += 1
                ]);
            }else{
                $this->location->area->town->district->lga->lgaBirthCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'birth'=> $lga_birth->birth + 1,
                    'monthly_birth'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->lga->lgaBirthCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'monthly_birth'=>1,
                'birth'=>1,
            ]);
        }
    }

    public function countInTheBirth()
    {
        $this->updateAreaBirth();
        $this->updateTownBirth();
        $this->updateDistrictBirth();
        $this->updateLgaBirth();
    }
}
