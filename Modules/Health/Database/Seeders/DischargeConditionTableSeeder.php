<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Health\Entities\DischargeCondition;

class DischargeConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $conditions = ['Ask to be discharge','Decide to discharge'];

        foreach($conditions as $condition){
            DischargeCondition::firstOrCreate(['name'=>$condition]);
        }
    }
}
