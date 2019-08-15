<?php

namespace Modules\Education\Charts;

class Report extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
   
    public function createChart()
    {
        $this->labels($this->label);
        $this->dataset(teacher()->school->name.' Report', 'Bar',$this->reportDataset())->color($this->color);
        return $this;
    }
}
