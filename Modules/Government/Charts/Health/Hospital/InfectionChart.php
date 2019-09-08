<?php

namespace Modules\Government\Charts\Health\Hospital;

use Modules\Core\Charts\BaseChart;

class InfectionChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
   
    public function createChart()
    {
        $this->labels(session('label'));
        $this->dataset(session('infection').' Report', 'Bar',session('data_set'))->color($this->color);
        return $this;
    }
}
