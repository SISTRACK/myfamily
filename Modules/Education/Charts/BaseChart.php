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
    	$label = ['2017','2018','2019'];
    	
    	return $label;
    }

    public function admissionDataset()
    {
        return ['243','334','339'];
    }

    public function graduationDataset()
    {
        return ['200','224','299'];
    }

    public function reportDataset()
    {
        return ['24','12','8'];
    }
    
}
