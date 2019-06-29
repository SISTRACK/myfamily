<?php

namespace Modules\Government\Charts\Health;

use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;

class Polio extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->lga = [
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
    public function createChart()
    {
        $this->labels($this->lga);
        $this->dataset('Polio  Report 2019', 'Bar',[
            
            '0',
            '3',
            '4',
            '1',
            '4',
            '3',
            '9',
            '7',
            '0',
            '0',
            '2',
            '7',
            '0',
            '2',
            '0',
            '6',
            '6',
            '12',
            '0',
            '0',
            '2',
            '6',
            '8'
        ])->color('#6da252');
        return $this;
    }
}
