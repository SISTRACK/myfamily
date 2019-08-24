<?php

namespace Modules\Security\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Security\Entities\PoliceStationType;

class PoliceStationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $police_station_types = ['Devision', 'Out Post'];

        foreach ($police_station_types as $station_type) {
            PoliceStationType::firstOrCreate(['name'=>$station_type]);
        }
    }
}
