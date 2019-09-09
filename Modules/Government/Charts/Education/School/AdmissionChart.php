<?php

namespace Modules\Government\Charts\Education\School;

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
        $this->dataset('School Admission Report', 'Bar',session('data_set'))->color($this->color);
        return $this;
    }
}
