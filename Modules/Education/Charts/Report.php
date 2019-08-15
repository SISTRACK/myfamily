<?php

namespace Modules\Education\Charts;

use Modules\Core\Charts\BaseChart;

class Report extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
   
    public function admitted()
    {

        $this->labels(['2017','2018','2019']);
        $this->dataset(teacher()->school->name.' Report', 'Bar',[
            '10',
            '3',
            '14',
            
        ])->color($this->color);
        return $this;
    }
}
