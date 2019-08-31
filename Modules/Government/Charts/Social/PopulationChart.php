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
        $this->labels(session('label'));
        $this->dataset('People Register', 'Bar',session('data_set'))->color($this->color);
        return $this;
    }
}
