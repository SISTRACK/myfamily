<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Address\Entities\State;

class GenerateAddressCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:address-code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command will assign the code to state lga disctrict';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(37);

        $bar->setBarWidth(100);

        $bar->start();
        $stateCode = 1;
        foreach(State::all() as $state)
        {
            $state->update(['code'=>$this->formatCode($stateCode)]);
            $lgaCode = 1;
            foreach($state->lgas as $lga){
                $lga->update(['code'=>$this->formatCode($lgaCode)]);
                $districtCode = 1;
                foreach($lga->districts as $district){
                    $district->update(['code'=>$this->formatCode($districtCode)]);
                    $townCode = 1;
                    foreach($district->towns as $town){
                        $town->update(['code'=>$this->formatCode($townCode)]);
                        $areaCode = 1;
                        foreach($town->areas as $area){
                            $area->update(['code'=>$this->formatCode($areaCode)]);
                            $areaCode++;
                        }

                        $areaCode = 1;
                        $townCode ++ ;
                    }

                    $townCode = 1;
                    $districtCode ++ ;
                }

                $districtCode = 1;
                $lgaCode ++ ;
            }

            $lgaCode = 1;
            $stateCode ++ ;
            $bar->advance();
        }

        $bar->finish();
    }

    public function formatCode($code)
    {
        if($code < 10){
            $code = '0'.$code;
        }
        return $code;
    }
}
