<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Health\Entities\HospitalType;

class HospitalTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $hospital_types = ['Government','Private'];
        foreach ($hospital_types as $hospital_type) {
            HospitalType::firstOrCreate(['name'=>$hospital_type]);
        }
    }
}
