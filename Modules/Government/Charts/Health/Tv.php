<?php

namespace Modules\Government\Charts\Health;

use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;

class Tv extends Chart
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
        $this->dataset('Tv  Report 2019', 'Bar',[
            
            '0',
            '3',
            '0',
            '0',
            '1',
            '3',
            '0',
            '1',
            '0',
            '0',
            '9',
            '0',
            '0',
            '2',
            '0',
            '2',
            '2',
            '2',
            '2',
            '4',
            '2',
            '2',
            '1'
        ])->color('#6da252');
        return $this;
    }
}
