<?php

namespace Modules\Government\Charts\Health\Hospital;

use Modules\Core\Charts\BaseChart;

class HospitalBirthChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
    public function createChart()
    {
        $this->labels(session('label'));
        $this->dataset('Hospital Birth  Report', 'Bar',session('data_set'))->color($this->color);
        return $this;
    }
}
