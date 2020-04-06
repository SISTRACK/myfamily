<?php

namespace Modules\Government\Events\Education\School;

use Illuminate\Queue\SerializesModels;
use Modules\Profile\Entities\Profile;
use Modules\Government\Entities\Year;

class NewAdmissionEvent
{
    use SerializesModels;

    private $location;
    private $year;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Profile $profile)
    {
        $this->year = Year::firstOrCreate(['year'=>date('Y')]);
        $this->location = $profile->thisProfileFamily()->location;
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
    
    public function updateAreaAdmission()
    {
        //get the last month of the year
        $area_school_admission = $this->location->area->areaSchoolReportCollations->last();
        //if this month discharge exit update it from the discharge of the last month
        if($area_school_admission){
            if($area_school_admission->year_id == $this->year->id){
                $area_school_admission->update([
                    'admission'=>$area_school_admission->admission += 1,
                    'yearly_admission'=>$area_school_admission->yearly_admission += 1,
                ]);
            }else{
                $this->location->area->areaSchoolReportCollations()->create([
                'year_id'=>$this->year->id,
                'admission'=> $area_school_admission->admission + 1,
                'yearly_admission'=> 1,
                
            ]);
            }
        }else{
            $this->location->area->areaSchoolReportCollations()->create([
                'year_id'=>$this->year->id,
                'admission'=>1,
                'yearly_admission'=>1
            ]);
        }
        
    }

    public function updateTownAdmission()
    {
        //get the last month of the year
        $town_school_admission = $this->location->area->town->townSchoolReportCollations->last();
        
        //if this month discharge exit update it from the discharge of the last month
        if($town_school_admission){
            if($town_school_admission->year_id == $this->year->id){
                $town_school_admission->update([
                    'admission'=>$town_school_admission->admission += 1,
                    'yearly_admission'=>$town_school_admission->yearly_admission += 1,
                ]);
            }else{
                $this->location->area->town->townSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'admission'=> $town_school_admission->admission + 1,
                    'yearly_admission'=> 1
                ]);
            }
        }else{
            $this->location->area->town->townSchoolReportCollations()->create([
                'year_id'=>$this->year->id,
                'admission'=>1,
                'yearly_admission'=>1
            ]);
        } 
    }
    
    public function updateDistrictAdmission()
    {
        $district_school_admission = $this->location->area->town->district->districtSchoolReportCollations->last();

        if($district_school_admission){
            if($district_school_admission->year_id == $this->year->id){
                $district_school_admission->update([
                    'admission'=>$district_school_admission->admission += 1,
                    'yearly_admission'=>$district_school_admission->yearly_admission += 1,
                ]);
            }else{
                $this->location->area->town->district->districtSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'admission'=> $district_school_admission->admission + 1,
                    'yearly_admission'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->districtSchoolReportCollations()->create(
                [
                    'year_id'=>$this->year->id,
                    'admission'=>1,
                    'yearly_admission'=>1
                ]
            );
        }
    }

    public function updateLgaAdmission()
    {
        $lga_school_admission = $this->location->area->town->district->lga->lgaSchoolReportCollations->last();
        if($lga_school_admission){
            if($lga_school_admission->year_id == $this->year->id){
                $lga_school_admission->update([
                    'admission'=>$lga_school_admission->admission += 1,
                    'yearly_admission'=>$lga_school_admission->yearly_admission += 1,
                ]);
            }else{
                $this->location->area->town->district->lga->lgaSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'admission'=> $lga_school_admission->admission + 1,
                    'yearly_admission'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->lga->lgaSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'admission'=>1,
                    'yearly_admission'=>1
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
