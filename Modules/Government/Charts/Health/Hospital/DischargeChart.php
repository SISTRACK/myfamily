<?php

namespace Modules\Government\Charts\Health\Hospital;

use Modules\Core\Charts\BaseChart;

class DischargeChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
    public function createChart()
    {
        $this->labels(session('label'));
        $this->dataset('Malaria  Report 2019', 'Bar',session('data_set'))->color($this->color);
        return $this;
    }
}
