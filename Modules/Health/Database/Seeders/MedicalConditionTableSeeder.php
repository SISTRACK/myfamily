<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Health\Entities\MedicalCondition;

class MedicalConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $conditions = [
            'Critical',
            'Fair',
            'Good',
            'Serious',
            'Treated and released',
            'Treated and transferred',
            'Undetermined'
        ];

        foreach ($conditions as $condition) {
            MedicalCondition::firstOrCreate(['name'=>$condition]);
        }
    }
}
