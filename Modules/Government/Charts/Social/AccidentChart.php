<?php

namespace Modules\Government\Charts\Social;

use Modules\Core\Charts\BaseChart;

class AccidentChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
    public function createChart()
    {
        $this->labels($this->label);
        $this->dataset('Accident Report 2019', 'Bar',[
            '7',
            '20',
            '5',
            '15',
            '7',
            '8',
            '7',
            '0',
            '6',
            '6',
            '2',
            '2',
            '4',
            '10',
            '3',
            '4',
            '4',
            '4',
            '3',
            '9',
            '6',
            '6',
            '8'
        ])->color($this->color);
        return $this;
    }
}
