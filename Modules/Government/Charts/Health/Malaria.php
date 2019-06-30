<?php

namespace Modules\Government\Charts\Health;

use Modules\Core\Charts\BaseChart;

class Malaria extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
    public function createChart()
    {
        $this->labels($this->label);
        $this->dataset('Malaria  Report 2019', 'Bar',[
            
            '100',
            '30',
            '40',
            '40',
            '40',
            '30',
            '90',
            '70',
            '200',
            '50',
            '150',
            '70',
            '80',
            '70',
            '00',
            '60',
            '60',
            '20',
            '20',
            '40',
            '60',
            '60',
            '80',
        ])->color($this->color);
        return $this;
    }
}
