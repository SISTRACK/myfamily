<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BloodGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $bloods = [
            '0+','0-','A+','A-','B+','B-','AB+','AB-'
        ];
        
        foreach ($bloods as $blood) {
            BloodGroup::firstOrCreate(['name'=>$blood]);
        }
    }
}
