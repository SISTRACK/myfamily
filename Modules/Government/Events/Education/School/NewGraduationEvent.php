<?php

namespace Modules\Government\Events\Education\School;

use Illuminate\Queue\SerializesModels;
use Modules\Profile\Entities\Profile;
use Modules\Government\Entities\Year;

class NewGraduationEvent
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
        $this->countInTheGraduation();
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
    
    public function updateAreaGraduation()
    {
        //get the last year of the year
        $area_school_graduation = $this->location->area->areaSchoolReportCollations->last();
        //if this year discharge exit update it from the discharge of the last year
        if($area_school_graduation){
            if($area_school_graduation->year_id == $this->year->id){
                $area_school_graduation->update([
                    'graduation'=>$area_school_graduation->graduation += 1,
                    'yearly_graduation'=>$area_school_graduation->yearly_graduation += 1,
                ]);
            }else{
                $this->location->area->areaSchoolReportCollations()->create([
                'year_id'=>$this->year->id,
                'graduation'=> $area_school_graduation->graduation + 1,
                'yearly_graduation'=> 1,
                
            ]);
            }
        }else{
            $this->location->area->areaSchoolReportCollations()->create([
                'year_id'=>$this->year->id,
                'graduation'=>1,
                'yearly_graduation'=>1
            ]);
        }
        
    }

    public function updateTownGraduation()
    {
        //get the last year of the year
        $town_school_graduation = $this->location->area->town->townSchoolReportCollations->last();
        
        //if this year discharge exit update it from the discharge of the last year
        if($town_school_graduation){
            if($town_school_graduation->year_id == $this->year->id){
                $town_school_graduation->update([
                    'graduation'=>$town_school_graduation->graduation += 1,
                    'yearly_graduation'=>$town_school_graduation->yearly_graduation += 1,
                ]);
            }else{
                $this->location->area->town->townSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'graduation'=> $town_school_graduation->graduation + 1,
                    'yearly_graduation'=> 1
                ]);
            }
        }else{
            $this->location->area->town->townSchoolReportCollations()->create([
                'year_id'=>$this->year->id,
                'graduation'=>1,
                'yearly_graduation'=>1
            ]);
        } 
    }
    
    public function updateDistrictGraduation()
    {
        $district_school_graduation = $this->location->area->town->district->districtSchoolReportCollations->last();

        if($district_school_graduation){
            if($district_school_graduation->year_id == $this->year->id){
                $district_school_graduation->update([
                    'graduation'=>$district_school_graduation->graduation += 1,
                    'yearly_graduation'=>$district_school_graduation->yearly_graduation += 1,
                ]);
            }else{
                $this->location->area->town->district->districtSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'graduation'=> $district_school_graduation->graduation + 1,
                    'yearly_graduation'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->districtSchoolReportCollations()->create(
                [
                    'year_id'=>$this->year->id,
                    'graduation'=>1,
                    'yearly_graduation'=>1
                ]
            );
        }
    }

    public function updateLgaGraduation()
    {
        $lga_school_graduation = $this->location->area->town->district->lga->lgaSchoolReportCollations->last();
        if($lga_school_graduation){
            if($lga_school_graduation->year_id == $this->year->id){
                $lga_school_graduation->update([
                    'graduation'=>$lga_school_graduation->graduation += 1,
                    'yearly_graduation'=>$lga_school_graduation->yearly_graduation += 1,
                ]);
            }else{
                $this->location->area->town->district->lga->lgaSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'graduation'=> $lga_school_graduation->graduation + 1,
                    'yearly_graduation'=> 1
                ]);
            }
        }else{
            $this->location->area->town->district->lga->lgaSchoolReportCollations()->create([
                    'year_id'=>$this->year->id,
                    'graduation'=>1,
                    'yearly_graduation'=>1
                ]
            );
        }
    }

    public function countInTheGraduation()
    {
        $this->updateAreaGraduation();
        $this->updateTownGraduation();
        $this->updateDistrictGraduation();
        $this->updateLgaGraduation();
    }
}
