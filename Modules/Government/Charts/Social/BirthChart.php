<?php

namespace Modules\Government\Charts\Social;

use Modules\Core\Charts\BaseChart;

class BirthChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
    public function createChart()
    {
        $this->labels(session('label'));
        $this->dataset('Birth Report', 'Bar',session('data_set'))->color($this->color);
        return $this;
    }
}
