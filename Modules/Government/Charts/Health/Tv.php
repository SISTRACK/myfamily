<?php

namespace Modules\Government\Charts\Health;

use Modules\Core\Charts\BaseChart;

class Tv extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
    public function createChart()
    {
        $this->labels($this->label);
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
        ])->color($this->color);
        return $this;
    }
}
