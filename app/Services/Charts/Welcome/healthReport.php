<?php

namespace App\Services\Charts\Welcome;
use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;


class HealthReport extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
   
    public function createChart()
    {
        $this->labels(['bagudo','illo','zagga','kaoje','bahindi']);
        $this->dataset('Malaria', 'line',[3,5,6,30,9])->color('#6da252');
        return $this;
    }
}
