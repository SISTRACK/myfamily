<?php

namespace Modules\Education\Charts;

use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;

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
    	$years = [];
        foreach(schoolAdmin()->school->admitteds as $admission){
            if(!in_array($admission->year, $years)){
                $years[] = $admission->year;
            }
        }
        return $years;
    }

    public function admissionDataset()
    {
        $data_sets = [];
        foreach($this->getLabel() as $label){
            $count = 0;
            foreach (schoolAdmin()->school->admitteds as $admission) {
                if($admission->year == $label){
                    $count ++;
                }
            }
            $data_sets[] = $count;
        }
        return $data_sets;
    }

    public function graduationDataset()
    {
        $data_sets = [];
        foreach($this->getLabel() as $label){
            $count = 0;
            foreach (schoolAdmin()->school->admitteds as $admission) {
                if($admission->graduated && $admission->graduated->year == $label){
                    $count ++;
                }
            }
            $data_sets[] = $count;
        }
        return $data_sets;
    }

    public function reportDataset()
    {
        return ['24','12','8'];
    }
    
}
