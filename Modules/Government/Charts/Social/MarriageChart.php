<?php

namespace Modules\Government\Charts\Social;

use Modules\Core\Charts\BaseChart;

class MarriageChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
    public function createChart()
    {
        $this->labels(session('label'));
        $this->dataset('Marriage Report', 'Bar',session('data_set'))->color($this->color);
        return $this;
    }
}
