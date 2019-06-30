<?php

namespace Modules\Government\Charts\Education\Graduated;

use Modules\Core\Charts\BaseChart;

class CoeGraduated extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    
   
    public function graduated()
    {
        $this->labels($this->lga);
        $this->dataset('College Of Education Report 2019', 'Bar',[
            
            '10',
            '3',
            '4',
            '4',
            '4',
            '3',
            '9',
            '7',
            '20',
            '5',
            '15',
            '7',
            '8',
            '7',
            '0',
            '6',
            '6',
            '2',
            '2',
            '4',
            '6',
            '6',
            '8'
        ])->color($this->color);
        return $this;
    }
}
