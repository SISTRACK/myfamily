<?php

namespace Modules\Education\Charts;

class Graduation extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
   
    public function createChart()
    {
        $this->labels($this->label);
        $this->dataset(schoolAdmin()->school->name.' Graduates ', 'Bar',$this->graduationDataset())->color($this->color);
        return $this;
    }
}
