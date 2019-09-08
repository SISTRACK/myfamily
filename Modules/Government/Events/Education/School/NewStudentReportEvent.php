<?php

namespace Modules\Government\Events\Education\School;

use Illuminate\Queue\SerializesModels;
use Modules\Profile\Entities\Profile;

class NewStudentReportEvent
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
        $this->countInTheStudentReport()));
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
    
    public function updateAreaStudentReport()))
    {
        //get the last month of the year
        $area_school_report = $this->location->area->areaSchoolReportCollations->last();
        //if this month discharge exit update it from the discharge of the last month
        if($area_school_report){
            if($area_school_report->year_id == $this->year->id){
                $area_school_report->update([
                    'report'=>$area_school_report->report += 1,
                    'yearly_report'=>$area_school_report->yearly_report += 1,
                ]);
            }else{
                $this->location->area->areaSchoolReportCollations()->create([
                'year_id'=>$this->year->id,
                'report'=> $area_school_report->report + 1,
                'yearly_report'=> 1,
                
            ]);
            }
        }else{
            $this->location->area->areaSchoolReportCollations()->create([
                'year_id'=>$this->year->id,
                'report'=>1,
                'yearly_report'=>1
            ]);
        }
        
    }

    public function updateTownStudentReport()))
    {
        //get the last month of the year
        $town_school_report = $this->location->area->town->townSchoolReportCollations->last();
        
        //if this month discharge exit update it from the discharge of the last month
        if($town_school_report){
            if($town_school_report->year_id == $this->year->id){
                $town_school_report->update([
                    'report'=>$town_school_report->report += 1,
                    'yearly_report'=>$town_school_report->yearly_school_report += 1,
                ]);
            }else{
                $this->location->area->town->townSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'report'=> $town_school_report->report + 1,
                    'yearly_report'=> 1
                ]);
            }
        }else{
            $this->location->area->town->townSchoolReportCollations()->create([
                'year_id'=>$this->year->id,
                'report'=>1,
                'yearly_report'=>1
            ]);
        } 
    }
    
    public function updateDistrictStudentReport()))
    {
        $district_school_report = $this->location->area->town->district->districtSchoolReportCollations->last();

        if($district_school_report){
            if($district_school_report->year_id == $this->year->id){
                $district_school_report->update([
                    'report'=>$district_school_report->report += 1,
                    'yearly_report'=>$district_school_report->yearly_school_report += 1,
                ]);
            }else{
                $this->location->area->town->district->districtSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'report'=> $district_school_report->report + 1,
                    'yearly_report'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->districtSchoolReportCollations()->create(
                [
                    'year_id'=>$this->year->id,
                    'report'=>1,
                    'yearly_report'=>1
                ]
            );
        }
    }

    public function updateLgaStudentReport()))
    {
        $lga_school_report = $this->location->area->town->district->lga->lgaSchoolReportCollations->last();
        if($lga_school_report){
            if($lga_school_report->month_id == $this->month->id){
                $lga_school_report->update([
                    'report'=>$lga_school_report->report += 1,
                    'yearly_report'=>$lga_school_report->yearly_report += 1,
                ]);
            }else{
                $this->location->area->town->district->lga->lgaSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'report'=> $lga_school_report->report + 1,
                    'yearly_report'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->lga->lgaSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'report'=>1,
                    'yearly_report'=>1
                ]
            );
        }
    }

    public function countInTheStudentReport()))
    {
        $this->updateAreaStudentReport()));
        $this->updateTownStudentReport()));
        $this->updateDistrictStudentReport()));
        $this->updateLgaStudentReport()));
    }
}
