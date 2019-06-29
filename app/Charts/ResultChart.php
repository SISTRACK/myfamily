<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class ResultChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public $lga;

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
        $this->dataset('People Register', 'bar',[
            '7888929',
            '657575585',
            '65757585',
            '657570585',
            '65757585',
            '65757757',
            '657575851',
            '65757585',
            '6570585',
            '65757585',
            '657575851',
            '6575758',
            '6575585',
            '65757585',
            '65785585',
            '65757585',
            '657570585',
            '657575854',
            '65757585',
            '65757585',
            '65757585',
            '657575856',
            '65756585'
        ])->backgroundColor([
            '#6da252',
            '#7da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da242',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
            '#6da252',
        ])->fill(true);
        return $this;
    }
}
