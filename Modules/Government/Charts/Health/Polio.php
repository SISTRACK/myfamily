<?php

namespace Modules\Government\Charts\Health;

use Modules\Core\Charts\BaseChart;

class Polio extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
    public function createChart()
    {
        $this->labels($this->label);
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
        ])->color($this->color);
        return $this;
    }
}
