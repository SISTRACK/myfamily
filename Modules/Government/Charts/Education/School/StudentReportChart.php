<?php

namespace Modules\Government\Charts\Education\School;

use Modules\Core\Charts\BaseChart;

class StudentReportChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function createChart()
    {
        $this->labels(session('label'));
        $this->dataset('School Student Report', 'Bar',session('data_set'))->color($this->color);
        return $this;
    }
}
