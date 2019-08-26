<?php

namespace Modules\Health\Charts;

class DischargeChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
   
    public function createChart()
    {
        $this->labels($this->label);
        $this->dataset(doctor()->hospital->name.' Discharged Patients Report ', 'Bar',
            $this->dischargeDataset())->color($this->color);
        return $this;
    }
}
