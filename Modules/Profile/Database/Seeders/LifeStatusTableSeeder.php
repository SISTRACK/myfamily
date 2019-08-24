<?php

namespace Modules\Profile\Database\Seeders;


use Modules\Profile\Entities\LifeStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LifeStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $lives = [
               'Life',
               'Death'
            ];
            foreach($lives as $life){
                LifeStatus::firstOrCreate(['name'=>$life]);
            }
    }
}
