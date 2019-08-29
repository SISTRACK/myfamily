<?php

namespace Modules\Government\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Government\Entities\Month;

class MonthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        foreach ($months as $month) {
            Month::firstOrCreate(['month'=>$month]);
        }
    }
}
