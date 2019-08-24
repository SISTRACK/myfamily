<?php

namespace Modules\Profile\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProfileDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(GenderTableSeeder::class);
        $this->call(MaritalStatusTableSeeder::class);
        $this->call(MaritalStatusTableSeeder::class);
        $this->call(DeseaseTableSeeder::class);
        $this->call(TribeTableSeeder::class);
        $this->call(LifeStatusTableSeeder::class);
    }
}
