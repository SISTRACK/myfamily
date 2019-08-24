<?php

namespace Modules\Security\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Security\Entities\PoliceStationCategory;

class PoliceStationCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $police_station_categories = ['Devision','Head Quater'];

        foreach ($police_station_categories as $police_station_category) {
            PoliceStationCategory::firstOrCreate(['name'=>$police_station_category]);
        }
    }
}
