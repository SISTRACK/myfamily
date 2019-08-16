<?php

namespace Modules\Education\Charts;

class Admission extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
   
    public function createChart()
    {
        $this->labels($this->label);
        $this->dataset(schoolAdmin()->school->name.' Admission Report ', 'Bar',
            $this->admissionDataset())->color($this->color);
        return $this;
    }
}
