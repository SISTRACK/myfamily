<?php

namespace Modules\Government\Charts\Education\School;

use Modules\Core\Charts\BaseChart;

class GraduationChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function createChart()
    {
        $this->labels(session('label'));
        $this->dataset('School Graduation Report', 'Bar',session('data_set'))->color($this->color);
        return $this;
    }
}
