<?php

namespace Modules\Health\Charts;

use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;
use Modules\Health\Entities\Doctor;

class BaseChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public $color;

    public $user;

    public $label;
    
    public function __construct()
    {
        parent::__construct();
        $this->color = $this->getColor();  
        $this->label = $this->getLabel();  
    }
    public function getColor()
    {
    	return '#6da252';
    }
    public function getLabel()
    {
    	$label = [];
    	foreach (doctor()->hospital->doctors as $doctor) {
            if($doctor->role_id != 1){
                $label[] = $doctor->phone;
            }
        }
        return $label;
    }

    public function admissionDataset()
    {
        $data_sets = [];
        foreach($this->getLabel() as $label){
        	$count = 0;
            foreach (Doctor::where('phone',$label)->get() as $doctor) {
                if($doctor->role_id != 1){
                    foreach ($doctor->hospitalAdmissions as $admission) {
                    	$count++;
                    }
                }
            }
            $data_sets[] = $count;
        }
        return $data_sets;
    }

    public function dischargeDataset()
    {
        $data_sets = [];
        foreach($this->getLabel() as $label){
        	$count = 0;
            foreach (Doctor::where('phone',$label)->get() as $doctor) {
                foreach ($doctor->hospitalAdmissions as $admission) {
                	if($admission->dischargeAdmission){
                		$count++;
                		if($admission->dischargeAdmission->dischargeRevisits){
                			$count += count($admission->dischargeAdmission->dischargeRevisits);
                		}
                	}
                }
            }
            $data_sets[] = $count;
        }
        return $data_sets; 
    }
}
