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

    public $label;

    public function __construct()
    {
        parent::__construct();
        $this->label = $this->getLabel();
        $this->color = $this->getColor();
    }
    public function getColor()
    {
    	return '#6da252';
    }
    public function getLabel()
    {
    	return 
    	[
            'Binji',
            'Bodinga',
            'Dange Shuni',
            'Gada',
            'Goronyo',
            'Gudu',
            'Gwadabawa',
            'Illela',
            'Isa',
            'Kebbe',
            'Kware',
            'Rabah',
            'Sabon Birni',
            'Shagari',
            'Silame',
            'Sokoto North',
            'Sokoto South',
            'Tambuwal',
            'Tangaza',
            'Tureta',
            'Wamakko',
            'Wurno',
            'Yabo'
        ];
    }
    
}
