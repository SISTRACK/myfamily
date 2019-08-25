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

        $this->call(InfectionTableSeeder::class);
        $this->call(MedicalConditionTableSeeder::class);
        $this->call(TreatmentTableSeeder::class);
        $this->call(HospitalCategoryTableSeeder::class);
        $this->call(HospitalTypeTableSeeder::class);
        $this->call(DoctorDiscplineTableSeeder::class);
        $this->call(BloodGroupTableSeeder::class);
        $this->call(GenotypeTableSeeder::class);
        $this->call(DischargeConditionTableSeeder::class);
        $this->call(HospitalDepartmentTableSeeder::class);
    }
}
