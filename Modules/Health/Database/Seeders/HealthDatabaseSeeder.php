<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HealthDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call("InfectionTableSeeder");
        $this->call("MedicalConditionTableSeeder");
        $this->call("TreatmentTableSeeder");
        $this->call("HospitalCategoryTableSeeder");
        $this->call("HospitalTypeTableSeeder");
        $this->call("DoctorDiscplineTableSeeder");
    }
}
