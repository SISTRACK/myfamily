<?php

namespace Modules\Government\Events\Health;

use Illuminate\Queue\SerializesModels;
use Modules\Government\Entities\Month;
use Modules\Government\Entities\Year;
use Modules\Health\Entities\HospitalAdmission;

class NewStateCitizenHospitalAdmissionEvent
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
    public function __construct(HospitalAdmission $admission)
    {
        $this->year = Year::firstOrCreate(['year'=>date('Y')]);
        $this->month = $this->getCurrentMonth();
        $this->location = $admission->profile->thisProfileFamily()->location;
        $this->countInTheAdmission();
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
    public function updateAreaAdmission()
    {
        //get the last month of the year
        $area_discharge = $this->location->area->areaHospitalReportCollations->last();
        //if this month discharge exit update it from the discharge of the last month
        if($area_discharge){
            if($area_discharge->month_id == $this->month->id){
                $area_discharge->update([
                    'admission'=>$area_discharge->discharge += 1,
                    'monthly_admission'=>$area_discharge->monthly_discharge += 1,
                ]);
            }else{
                $this->location->area->areaHospitalReportCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'admission'=> $area_discharge->discharge + 1,
                'monthly_admission'=> 1
            ]);
            }
        }else{
            $this->location->area->areaHospitalReportCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'admission'=>1,
                'monthly_admission'=>1
            ]);
        }
        
    }

    public function updateTownAdmission()
    {
        //get the last month of the year
        $town_discharge = $this->location->area->town->townHospitalReportCollations->last();
        
        //if this month discharge exit update it from the discharge of the last month
        if($town_discharge){
            if($town_discharge->month_id == $this->month->id){
                $town_discharge->update([
                    'admission'=>$town_discharge->discharge += 1,
                    'monthly_admission'=>$town_discharge->monthly_discharge += 1,
                ]);
            }else{
                $this->location->area->town->townHospitalReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'admission'=> $town_discharge->discharge + 1,
                    'monthly_admission'=> 1
                ]);
            }
        }else{
            $this->location->area->town->townHospitalReportCollations()->create([
                'year_id'=>$this->year->id,
                'month_id'=>$this->month->id,
                'admission'=>1,
                'monthly_admission'=>1
            ]);
        }
        
    }
    
    public function updateDistrictAdmission()
    {
        $district_discharge = $this->location->area->town->district->districtHospitalReportCollations->last();

        if($district_discharge){
            if($district_discharge->month_id == $this->month->id){
                $district_discharge->update([
                    'admission'=>$district_discharge->discharge += 1,
                    'monthly_admission'=>$district_discharge->monthly_discharge += 1,
                ]);
            }else{
                $this->location->area->town->district->districtHospitalReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'admission'=> $district_discharge->discharge + 1,
                    'monthly_admission'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->districtHospitalReportCollations()->create(
                [
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'admission'=>1,
                    'monthly_admission'=>1
                ]
            );
        }
    }

    public function updateLgaAdmission()
    {
        $lga_discharge = $this->location->area->town->district->lga->lgaHospitalReportCollations->last();
        if($lga_discharge){
            if($lga_discharge->month_id == $this->month->id){
                $lga_discharge->update([
                    'admission'=>$lga_discharge->discharge += 1,
                    'monthly_admission'=>$lga_discharge->monthly_discharge += 1,
                ]);
            }else{
                $this->location->area->town->district->lga->lgaHospitalReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'admission'=> $lga_discharge->discharge + 1,
                    'monthly_admission'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->lga->lgaHospitalReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'month_id'=>$this->month->id,
                    'admission'=>1,
                    'monthly_admission'=>1
                ]
            );
        }
    }

    public function countInTheAdmission()
    {
        $this->updateAreaAdmission();
        $this->updateTownAdmission();
        $this->updateDistrictAdmission();
        $this->updateLgaAdmission();
    }
}
