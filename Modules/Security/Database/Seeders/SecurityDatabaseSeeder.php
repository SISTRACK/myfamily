<?php

namespace Modules\Security\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SecurityDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CourtTypeTableSeeder::class);
        $this->call(CourtCategoryTableSeeder::class);
        $this->call(PoliceStationTypeTableSeeder::class);
        $this->call(PoliceStationCategoryTableSeeder::class);
    }
}
