<?php

namespace Modules\Government\Charts\Health;

use Modules\Core\Charts\BaseChart;

class AdmissionChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
    public function createChart()
    {
        $this->labels(session('label'));
        $this->dataset('Hospital Patient Admission Report', 'Bar',session('data_set'))->color($this->color);
        return $this;
    }
}
