<?php

namespace Modules\Core\Charts;

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
        $this->user = auth()->guard('government')->user();
        $this->label = $this->getLabel();
        $this->color = $this->getColor();  
    }
    public function getColor()
    {
    	return '#6da252';
    }
    public function getLabel()
    {
    	$label = [];
    	if($this->user->lga){
            foreach ($this->user->lga->districts as $district) {
             	$label[] = strtoupper($district->name.' district');
            }
    	}else if($this->user->state){
            foreach ($this->user->state->lgas as $lga) {
             	$label[] = $lga->name;
            }
    	}else if($this->user->district){
            foreach ($this->user->district->towns as $town) {
             	$label[] = $town->name;
            }
    	}
    	return $label;
    }
    
}
