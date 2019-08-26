<?php

namespace Modules\Health\Charts;

class AdmissionChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
   
    public function createChart()
    {
        $this->labels($this->label);
        $this->dataset(doctor()->hospital->name.' Patients Admission Report ', 'Bar',
            $this->admissionDataset())->color($this->color);
        return $this;
    }
}
