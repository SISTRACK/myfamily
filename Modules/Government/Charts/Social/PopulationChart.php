<?php

namespace Modules\Government\Charts\Social;

use Modules\Core\Charts\BaseChart;

class PopulationChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
    public function createChart()
    {
        $this->labels($this->label);
        $this->dataset('People Register', 'Bar',[
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
        ])->color($this->color);
        return $this;
    }
}
