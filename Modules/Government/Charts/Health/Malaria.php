<?php

namespace Modules\Government\Charts\Health;

use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;

class Malaria extends Chart
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
        $this->dataset('Malaria  Report 2019', 'Bar',[
            
            '100',
            '30',
            '40',
            '40',
            '40',
            '30',
            '90',
            '70',
            '200',
            '50',
            '150',
            '70',
            '80',
            '70',
            '00',
            '60',
            '60',
            '20',
            '20',
            '40',
            '60',
            '60',
            '80',
        ])->color('#6da252');
        return $this;
    }
}
